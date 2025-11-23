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

$identifier = trim((string)($data['identifier'] ?? ''));
$password   = (string)($data['password'] ?? '');

$errors = [];

if ($identifier === '') {
    $errors['identifier'] = 'Username or email is required.';
}

if ($password === '') {
    $errors['password'] = 'Password is required.';
}

if (!empty($errors)) {
    backend_json_response(422, [
        'ok'     => false,
        'errors' => $errors,
    ]);
}

try {
    $pdo = backend_get_pdo();

    $stmt = $pdo->prepare(
        'SELECT id, username, email, password_hash
           FROM users
          WHERE username = :id OR email = :id
          LIMIT 1'
    );

    $stmt->execute([':id' => $identifier]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, (string)$user['password_hash'])) {
        backend_json_response(401, [
            'ok'    => false,
            'error' => 'Invalid username/email or password.',
        ]);
    }
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok'    => false,
        'error' => 'Unexpected server error.',
    ]);
}

session_start();
session_regenerate_id(true);

$_SESSION['user_id']    = (int)$user['id'];
$_SESSION['username']   = (string)$user['username'];
$_SESSION['user_email'] = (string)$user['email'];

backend_json_response(200, [
    'ok'   => true,
    'user' => [
        'id'       => (int)$user['id'],
        'username' => (string)$user['username'],
        'email'    => (string)$user['email'],
    ],
]);
