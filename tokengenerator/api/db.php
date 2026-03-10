<?php

declare(strict_types=1);

function getDbConnection(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv('DB_HOST') ?: 'localhost';
    $db = getenv('DB_NAME') ?: 'austriax_web_id_ff_intranet';
    $user = getenv('DB_USER') ?: 'dieserkleinmann';
    $pass = getenv('DB_PASS') ?: '!123456789!';
    $port = (int) (getenv('DB_PORT') ?: '3306');

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
