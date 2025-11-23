<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

try {
    $pdo = backend_get_pdo();

    $stmt = $pdo->prepare('SELECT id, name, icon_name FROM categories ORDER BY name');
    $stmt->execute();

    $categories = $stmt->fetchAll();

    backend_json_response(200, [
        'ok' => true,
        'categories' => $categories,
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}