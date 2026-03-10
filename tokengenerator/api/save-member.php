<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/db.php';

$input = json_decode((string) file_get_contents('php://input'), true);
$firstName = trim((string) ($input['firstName'] ?? ''));
$lastName = trim((string) ($input['lastName'] ?? ''));

if ($firstName === '' || $lastName === '') {
    http_response_code(422);
    echo json_encode(['message' => 'Vorname und Nachname sind Pflichtfelder.']);
    exit;
}

try {
    $pdo = getDbConnection();

    $stmt = $pdo->prepare(
        'INSERT INTO members (first_name, last_name, created_at) VALUES (:first_name, :last_name, NOW())'
    );

    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
    ]);

    echo json_encode(['message' => 'Mitglied erfolgreich gespeichert.']);
} catch (Throwable $exception) {
    http_response_code(500);
    echo json_encode(['message' => 'Speichern fehlgeschlagen: ' . $exception->getMessage()]);
}
