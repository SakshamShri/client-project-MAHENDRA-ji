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

$username    = trim((string)($data['username'] ?? ''));
$email       = trim((string)($data['email'] ?? ''));
$phoneNumber = trim((string)($data['phone_number'] ?? ''));
$password    = (string)($data['password'] ?? '');
$confirm     = (string)($data['password_confirm'] ?? ($data['passwordConfirmation'] ?? ''));

$errors = [];

if ($username === '') {
    $errors['username'] = 'Username is required.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'A valid email address is required.';
}

if (strlen($password) < 8) {
    $errors['password'] = 'Password must be at least 8 characters.';
}

if ($password !== $confirm) {
    $errors['password_confirm'] = 'Passwords do not match.';
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
        'INSERT INTO users (username, email, phone_number, password_hash, created_at, updated_at)
         VALUES (:u, :e, :ph, :p, NOW(), NOW())'
    );

    $stmt->execute([
        ':u' => $username,
        ':e' => $email,
        ':ph' => $phoneNumber,
        ':p' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    $userId = (int)$pdo->lastInsertId();
} catch (PDOException $e) {
    if ((int)$e->getCode() === 23000) {
        $field = stripos($e->getMessage(), 'username') !== false ? 'username' :
                 (stripos($e->getMessage(), 'email') !== false ? 'email' : 'phone_number');

        backend_json_response(409, [
            'ok'     => false,
            'errors' => [
                $field => 'Already in use.',
            ],
        ]);
    }

    backend_json_response(500, [
        'ok'    => false,
        'error' => 'Unexpected server error.',
    ]);
}

session_start();
session_regenerate_id(true);

$_SESSION['user_id']   = $userId;
$_SESSION['username']  = $username;
$_SESSION['user_email'] = $email;

backend_json_response(201, [
    'ok'   => true,
    'user' => [
        'id'       => $userId,
        'username' => $username,
        'email'    => $email,
    ],
]);
