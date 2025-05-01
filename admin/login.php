<?php
session_start();
require_once '../config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Dummy admin credentials (for demo)
    $adminUser = 'admin';
    $adminPass = 'password123'; // In real app, use hashed passwords

    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Admin - Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">Login Admin</h1>
        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label class="block mb-2 font-medium" for="username">Username</label>
            <input type="text" id="username" name="username" required class="w-full p-2 border rounded mb-4" />
            <label class="block mb-2 font-medium" for="password">Password</label>
            <input type="password" id="password" name="password" required class="w-full p-2 border rounded mb-6" />
            <button type="submit" class="w-full bg-primary text-white py-2 rounded hover:bg-primary/90 transition">Masuk</button>
        </form>
    </div>
</body>
</html>
