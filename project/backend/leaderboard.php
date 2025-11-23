<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

$region = trim((string)($_GET['region'] ?? 'all'));
$metric = trim((string)($_GET['metric'] ?? 'all'));
$followed = isset($_GET['followed']) && $_GET['followed'] === 'true';

try {
    $pdo = backend_get_pdo();

    // For now, return mock data or calculate based on votes
    // This is simplified; in reality, calculate PSI scores based on voting alignment or something
    $sql = 'SELECT u.id, u.username, COUNT(v.id) as vote_count FROM users u LEFT JOIN votes v ON u.id = v.user_id GROUP BY u.id ORDER BY vote_count DESC LIMIT 10';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $leaders = $stmt->fetchAll();

    backend_json_response(200, [
        'ok' => true,
        'leaders' => $leaders,
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}