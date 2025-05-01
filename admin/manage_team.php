<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data tim
$teams = [
    [
        'id' => 1,
        'name' => 'Sarah Johnson',
        'role' => 'Wedding Coordinator',
        'contact' => '081122334455'
    ],
    [
        'id' => 2,
        'name' => 'Michael Lee',
        'role' => 'Assistant Coordinator',
        'contact' => '082233445566'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_team = [
        'id' => count($teams) + 1,
        'name' => $_POST['name'] ?? '',
        'role' => $_POST['role'] ?? '',
        'contact' => $_POST['contact'] ?? ''
    ];
    $teams[] = $new_team;
    $message = "Data tim berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Tim WO - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Tim WO</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Anggota Tim Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="name">Nama</label>
            <input type="text" id="name" name="name" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="role">Jabatan</label>
            <input type="text" id="role" name="role" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="contact">Kontak</label>
            <input type="text" id="contact" name="contact" required class="w-full p-2 border rounded" />
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Anggota Tim</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Jabatan</th>
                <th class="p-3 text-left">Kontak</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $team['id']; ?></td>
                <td class="p-3"><?php echo $team['name']; ?></td>
                <td class="p-3"><?php echo $team['role']; ?></td>
                <td class="p-3"><?php echo $team['contact']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
