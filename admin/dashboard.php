<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin - Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-primary text-white p-4">
        <h1 class="text-2xl font-semibold">Dashboard Admin</h1>
        <a href="logout.php" class="text-sm underline hover:text-gray-200">Logout</a>
    </header>
    <main class="p-6">
        <h2 class="text-xl font-semibold mb-4">Selamat datang di panel admin Wedding Organizer</h2>
        <p>Gunakan menu di bawah untuk mengelola data aplikasi.</p>
        <nav class="mt-6 space-y-3">
            <a href="manage_couples.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Data Pasangan</a>
            <a href="manage_rundown.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Rundown</a>
            <a href="manage_vendors.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Vendor</a>
            <a href="manage_team.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Tim WO</a>
            <a href="manage_media.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Media</a>
            <a href="manage_location.php" class="block bg-white p-4 rounded shadow hover:bg-primary hover:text-white transition">Kelola Lokasi & Detail Acara</a>
        </nav>
    </main>
</body>
</html>
