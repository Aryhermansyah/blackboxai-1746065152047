<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data untuk preview
$couples = [
    [
        'id' => 1,
        'couple_names' => 'Ahmad & Fatima',
        'event_date' => '2024-03-15',
        'venue' => 'Grand Ballroom Hotel Mulia',
        'location' => 'Jakarta Selatan'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_couple = [
        'id' => count($couples) + 1,
        'couple_names' => $_POST['couple_names'] ?? '',
        'event_date' => $_POST['event_date'] ?? '',
        'venue' => $_POST['venue'] ?? '',
        'location' => $_POST['location'] ?? ''
    ];
    $couples[] = $new_couple;
    $message = "Data pasangan berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Data Pasangan - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Data Pasangan</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Pasangan Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="couple_names">Nama Pasangan</label>
            <input type="text" id="couple_names" name="couple_names" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="event_date">Tanggal Acara</label>
            <input type="date" id="event_date" name="event_date" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="venue">Venue</label>
            <input type="text" id="venue" name="venue" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="location">Lokasi</label>
            <input type="text" id="location" name="location" required class="w-full p-2 border rounded" />
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Pasangan</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama Pasangan</th>
                <th class="p-3 text-left">Tanggal Acara</th>
                <th class="p-3 text-left">Venue</th>
                <th class="p-3 text-left">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($couples as $couple): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $couple['id']; ?></td>
                <td class="p-3"><?php echo $couple['couple_names']; ?></td>
                <td class="p-3"><?php echo $couple['event_date']; ?></td>
                <td class="p-3"><?php echo $couple['venue']; ?></td>
                <td class="p-3"><?php echo $couple['location']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
