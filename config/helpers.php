<?php

if (!function_exists('slugify')) {
    function slugify($text) {
        // substitui caracteres não alfanuméricos por hífens
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // converte para caracteres alfanuméricos
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove caracteres não permitidos
        $text = preg_replace('~[^-\w]+~', '', $text);

        // converte para minúsculas
        $text = strtolower(trim($text, '-'));

        // remove hífens duplicados
        $text = preg_replace('~-+~', '-', $text);

        return $text;
    }
}

if (!function_exists('url')) {
    function url(string $path): string {
        return trim(URL, '/') . '/' . trim($path, '/');
    }
}

if (!function_exists('redirect')) {
    function redirect(string $path, array $data = []): void {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        header('Location: ' . url($path));
        exit;
    }
}

if (!function_exists('upload')) {
    function upload(string $file, string $path): string|null {
        if (!isset($_FILES[$file])) return null;

        $file = $_FILES[$file];

        if ($file['error'] !== 0) return null;

        $path = trim($path, '/');
        $fullPath = __DIR__ . '/../assets/uploads/' . $path;

        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0777, true);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = md5(json_encode($file) . time() . date('Y-m-d-H-i-s')) . '-' . date('Y-m-d-H-i-s') . '.' . $extension;

        move_uploaded_file($file['tmp_name'], $fullPath . '/' . $filename);

        return $path . '/' . $filename;
    }
}

if (!function_exists('deleteFile')) {
    function deleteFile(string $path): void {
        $path = trim($path, '/');
        $fullPath = __DIR__ . '/../assets/uploads/' . $path;

        if (!file_exists($fullPath)) return;

        unlink($fullPath);
    }
}

if (!function_exists('redirectIfIsNotAuthenticated')) {
    function redirectIfIsNotAuthenticated(): void {
        if (!isset($_SESSION['auth-id'])) {
            redirect('/admin/login.php');
        }
    }
}
