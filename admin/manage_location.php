<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data lokasi
$locations = [
    [
        'id' => 1,
        'venue' => 'Grand Ballroom Hotel Mulia',
        'address' => 'Jl. Melati No. 123, Jakarta Selatan',
        'google_maps_link' => 'https://maps.google.com/?q=Grand+Ballroom+Hotel+Mulia',
        'event_date' => '2024-03-15',
        'couple_names' => 'Ahmad & Fatima'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_location = [
        'id' => count($locations) + 1,
        'venue' => $_POST['venue'] ?? '',
        'address' => $_POST['address'] ?? '',
        'google_maps_link' => $_POST['google_maps_link'] ?? '',
        'event_date' => $_POST['event_date'] ?? '',
        'couple_names' => $_POST['couple_names'] ?? ''
    ];
    $locations[] = $new_location;
    $message = "Data lokasi berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Lokasi & Detail Acara - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Lokasi & Detail Acara</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Lokasi Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="venue">Nama Venue</label>
            <input type="text" id="venue" name="venue" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="address">Alamat Lengkap</label>
            <input type="text" id="address" name="address" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="google_maps_link">Link Google Maps (opsional)</label>
            <input type="url" id="google_maps_link" name="google_maps_link" class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="event_date">Tanggal Pernikahan</label>
            <input type="date" id="event_date" name="event_date" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="couple_names">Nama Pasangan</label>
            <input type="text" id="couple_names" name="couple_names" required class="w-full p-2 border rounded" />
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Lokasi & Detail Acara</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Nama Venue</th>
                <th class="p-3 text-left">Alamat</th>
                <th class="p-3 text-left">Link Google Maps</th>
                <th class="p-3 text-left">Tanggal Pernikahan</th>
                <th class="p-3 text-left">Nama Pasangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $location['id']; ?></td>
                <td class="p-3"><?php echo $location['venue']; ?></td>
                <td class="p-3"><?php echo $location['address']; ?></td>
                <td class="p-3">
                    <?php if ($location['google_maps_link']): ?>
                    <a href="<?php echo $location['google_maps_link']; ?>" target="_blank" class="text-primary underline">Lihat Map</a>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </td>
                <td class="p-3"><?php echo $location['event_date']; ?></td>
                <td class="p-3"><?php echo $location['couple_names']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
