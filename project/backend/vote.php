<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

$data = backend_read_input();

$poll_id = (int)($data['poll_id'] ?? 0);
$option_id = (int)($data['option_id'] ?? 0);

if ($poll_id <= 0 || $option_id <= 0) {
    backend_json_response(422, [
        'ok' => false,
        'errors' => ['poll_id' => 'Invalid poll', 'option_id' => 'Invalid option'],
    ]);
}

session_start();
if (!isset($_SESSION['user_id'])) {
    backend_json_response(401, [
        'ok' => false,
        'error' => 'Not logged in',
    ]);
}
$user_id = $_SESSION['user_id'];

try {
    $pdo = backend_get_pdo();

    // Check if poll is active
    $stmt = $pdo->prepare('SELECT status FROM polls WHERE id = :poll_id');
    $stmt->execute([':poll_id' => $poll_id]);
    $poll = $stmt->fetch();
    if (!$poll || $poll['status'] !== 'active') {
        backend_json_response(400, [
            'ok' => false,
            'error' => 'Poll is not active',
        ]);
    }

    // Check if option exists
    $stmt = $pdo->prepare('SELECT id FROM poll_options WHERE id = :option_id AND poll_id = :poll_id');
    $stmt->execute([':option_id' => $option_id, ':poll_id' => $poll_id]);
    if (!$stmt->fetch()) {
        backend_json_response(400, [
            'ok' => false,
            'error' => 'Invalid option',
        ]);
    }

    // Check if user already voted
    $stmt = $pdo->prepare('SELECT id FROM votes WHERE user_id = :user_id AND poll_id = :poll_id');
    $stmt->execute([':user_id' => $user_id, ':poll_id' => $poll_id]);
    if ($stmt->fetch()) {
        backend_json_response(409, [
            'ok' => false,
            'error' => 'Already voted',
        ]);
    }

    // Insert vote
    $stmt = $pdo->prepare('INSERT INTO votes (user_id, poll_id, option_id, voted_at) VALUES (:user_id, :poll_id, :option_id, NOW())');
    $stmt->execute([
        ':user_id' => $user_id,
        ':poll_id' => $poll_id,
        ':option_id' => $option_id,
    ]);

    backend_json_response(201, [
        'ok' => true,
        'message' => 'Vote recorded',
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}