<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

$allowedRoles = ['kommando', 'verwaltung'];
$currentRole = isset($_SESSION['role']) ? mb_strtolower(trim((string) $_SESSION['role'])) : null;
if ($currentRole === null || !in_array($currentRole, $allowedRoles, true)) {
  http_response_code(403);
  echo json_encode(['success' => false, 'message' => 'Keine Berechtigung für diese Aktion.']);
  exit;
}

$token = isset($_POST['token']) ? mb_strtoupper(trim((string) $_POST['token'])) : '';
$status = isset($_POST['status']) ? trim((string) $_POST['status']) : '';
$memberId = isset($_POST['member_id']) && $_POST['member_id'] !== '' ? (int) $_POST['member_id'] : null;
$createdBy = isset($_POST['created_by']) && $_POST['created_by'] !== '' ? (int) $_POST['created_by'] : null;
$expiresAt = isset($_POST['expires_at']) && $_POST['expires_at'] !== '' ? (string) $_POST['expires_at'] : null;
$usedAt = isset($_POST['used_at']) && $_POST['used_at'] !== '' ? (string) $_POST['used_at'] : null;
$usedByMemberId = isset($_POST['used_by_member_id']) && $_POST['used_by_member_id'] !== '' ? (int) $_POST['used_by_member_id'] : null;
$notes = isset($_POST['notes']) ? trim((string) $_POST['notes']) : null;

if (!preg_match('/^FFWN-[A-Z0-9]{4}-[A-Z0-9]{2}$/', $token)) {
  http_response_code(422);
  echo json_encode(['success' => false, 'message' => 'Ungültiges Token-Format. Erlaubt: FFWN-XXXX-XX']);
  exit;
}

if ($status === '' || $createdBy === null || $createdBy < 1) {
  http_response_code(422);
  echo json_encode(['success' => false, 'message' => 'Pflichtfelder fehlen (status, created_by).']);
  exit;
}

if ($expiresAt !== null) {
  $expiresAt = str_replace('T', ' ', $expiresAt) . ':00';
}

if ($usedAt !== null) {
  $usedAt = str_replace('T', ' ', $usedAt) . ':00';
}

$config = require __DIR__ . '/../../../config/database.php';
$dsn = sprintf(
  'mysql:host=%s;port=%d;dbname=%s;charset=%s',
  $config['host'],
  $config['port'],
  $config['database'],
  $config['charset']
);

try {
  $pdo = new PDO($dsn, $config['user'], $config['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);

  $stmt = $pdo->prepare('INSERT INTO tokens (member_id, token, status, created_by, expires_at, used_at, used_by_member_id, notes) VALUES (:member_id, :token, :status, :created_by, :expires_at, :used_at, :used_by_member_id, :notes)');
  $stmt->execute([
    ':member_id' => $memberId,
    ':token' => $token,
    ':status' => $status,
    ':created_by' => $createdBy,
    ':expires_at' => $expiresAt,
    ':used_at' => $usedAt,
    ':used_by_member_id' => $usedByMemberId,
    ':notes' => $notes,
  ]);

  echo json_encode([
    'success' => true,
    'id' => (int) $pdo->lastInsertId(),
    'token' => $token,
  ]);
} catch (Throwable $exception) {
  http_response_code(500);
  echo json_encode([
    'success' => false,
    'message' => 'DB-Fehler beim Speichern des Tokens.',
  ]);
}
