<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data vendor
$vendors = [
    [
        'id' => 1,
        'name' => 'Elegant Decor',
        'contact' => '081234567890',
        'email' => 'elegant@decor.com',
        'services' => '5 Round Tables, Stage Decoration, Flower Arrangements, Lighting Setup'
    ],
    [
        'id' => 2,
        'name' => 'Divine Photography',
        'contact' => '087654321098',
        'email' => 'divine@photo.com',
        'services' => '8 Hours Coverage, 2 Photographers, Drone Shots, Same Day Edit'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_vendor = [
        'id' => count($vendors) + 1,
        'name' => $_POST['name'] ?? '',
        'contact' => $_POST['contact'] ?? '',
        'email' => $_POST['email'] ?? '',
        'services' => $_POST['services'] ?? ''
    ];
    $vendors[] = $new_vendor;
    $message = "Data vendor berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Vendor - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Vendor</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Vendor Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="name">Nama Vendor</label>
            <input type="text" id="name" name="name" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="contact">Kontak</label>
            <input type="text" id="contact" name="contact" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="email">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="services">Layanan/Item</label>
            <textarea id="services" name="services" required class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Vendor</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama Vendor</th>
                <th class="p-3 text-left">Kontak</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Layanan/Item</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendors as $vendor): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $vendor['id']; ?></td>
                <td class="p-3"><?php echo $vendor['name']; ?></td>
                <td class="p-3"><?php echo $vendor['contact']; ?></td>
                <td class="p-3"><?php echo $vendor['email']; ?></td>
                <td class="p-3"><?php echo $vendor['services']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
