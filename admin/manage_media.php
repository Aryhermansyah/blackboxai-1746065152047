<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data media
$media_items = [
    [
        'id' => 1,
        'type' => 'photo',
        'title' => 'Foto Persiapan',
        'url' => 'https://images.pexels.com/photos/1114425/pexels-photo-1114425.jpeg',
        'description' => 'Foto persiapan acara pernikahan'
    ],
    [
        'id' => 2,
        'type' => 'moodboard',
        'title' => 'Inspirasi Dekorasi',
        'url' => 'https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg',
        'description' => 'Moodboard dekorasi'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_media = [
        'id' => count($media_items) + 1,
        'type' => $_POST['type'] ?? '',
        'title' => $_POST['title'] ?? '',
        'url' => $_POST['url'] ?? '',
        'description' => $_POST['description'] ?? ''
    ];
    $media_items[] = $new_media;
    $message = "Data media berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Media - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Media</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Media Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="type">Tipe Media</label>
            <select id="type" name="type" required class="w-full p-2 border rounded">
                <option value="">Pilih Tipe</option>
                <option value="photo">Photo Gallery</option>
                <option value="moodboard">Moodboard</option>
                <option value="playlist">Music Playlist</option>
                <option value="family_photo">Family Photo Plan</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="title">Judul</label>
            <input type="text" id="title" name="title" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="url">URL / Path</label>
            <input type="text" id="url" name="url" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="description">Deskripsi</label>
            <textarea id="description" name="description" class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Media</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Tipe</th>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">URL / Path</th>
                <th class="p-3 text-left">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($media_items as $media): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $media['id']; ?></td>
                <td class="p-3"><?php echo ucfirst(str_replace('_', ' ', $media['type'])); ?></td>
                <td class="p-3"><?php echo $media['title']; ?></td>
                <td class="p-3"><?php echo $media['url']; ?></td>
                <td class="p-3"><?php echo $media['description']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
