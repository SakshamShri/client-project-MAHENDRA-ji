<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

$status = trim((string)($_GET['status'] ?? 'active'));

if (!in_array($status, ['active', 'upcoming', 'closed', 'myinvitations'])) {
    backend_json_response(400, [
        'ok' => false,
        'error' => 'Invalid status',
    ]);
}

try {
    $pdo = backend_get_pdo();

    if ($status === 'myinvitations') {
        // Assume invitations are polls user is invited to
        session_start();
        if (!isset($_SESSION['user_id'])) {
            backend_json_response(401, [
                'ok' => false,
                'error' => 'Not logged in',
            ]);
        }
        $user_id = $_SESSION['user_id'];
        $stmt = $pdo->prepare('SELECT p.id, p.title, p.host, p.start_date, p.end_date, p.status FROM polls p INNER JOIN poll_invitations i ON p.id = i.poll_id WHERE i.user_id = :user_id ORDER BY p.start_date DESC');
        $stmt->execute([':user_id' => $user_id]);
    } else {
        $stmt = $pdo->prepare('SELECT id, title, host, start_date, end_date, status FROM polls WHERE status = :status ORDER BY start_date DESC');
        $stmt->execute([':status' => $status]);
    }

    $polls = $stmt->fetchAll();

    backend_json_response(200, [
        'ok' => true,
        'polls' => $polls,
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}