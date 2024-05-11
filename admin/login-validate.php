<?php

require_once __DIR__ . '/../config/config.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$users = Database::EXECUTE_QUERY('SELECT * FROM usuarios WHERE username = ? LIMIT 1', [$username]);

if (count($users) === 0) {
    redirect('/admin/login.php', [
        'error' => 'Username ou senha inválidos',
    ]);
}

$user = $users[0];

if (!password_verify($senha, $user->senha)) {
    redirect('/admin/login.php', [
        'error' => 'Username ou senha inválidos',
    ]);
}

$_SESSION['auth-id'] = md5($user->id);

redirect('/admin/produtos');
