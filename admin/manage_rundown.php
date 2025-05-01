<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Dummy data rundown
$rundowns = [
    [
        'id' => 1,
        'segment_type' => 'loading_crew',
        'start_time' => '06:00',
        'end_time' => '07:00',
        'task' => 'Team Briefing',
        'notes' => 'All crew must arrive on time'
    ],
    [
        'id' => 2,
        'segment_type' => 'akad',
        'start_time' => '09:00',
        'end_time' => '10:00',
        'task' => 'Akad Ceremony',
        'notes' => 'Main ceremony'
    ]
];

// Proses tambah data (dummy, tanpa simpan ke database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_rundown = [
        'id' => count($rundowns) + 1,
        'segment_type' => $_POST['segment_type'] ?? '',
        'start_time' => $_POST['start_time'] ?? '',
        'end_time' => $_POST['end_time'] ?? '',
        'task' => $_POST['task'] ?? '',
        'notes' => $_POST['notes'] ?? ''
    ];
    $rundowns[] = $new_rundown;
    $message = "Data rundown berhasil ditambahkan (dummy).";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Rundown - Admin Wedding Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-semibold mb-6">Kelola Rundown Acara</h1>
    <?php if (!empty($message)): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" class="mb-6 bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Rundown Baru</h2>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="segment_type">Segmen</label>
            <select id="segment_type" name="segment_type" required class="w-full p-2 border rounded">
                <option value="">Pilih Segmen</option>
                <option value="loading_crew">Loading Crew</option>
                <option value="akad">Akad</option>
                <option value="temu_manten">Temu Manten</option>
                <option value="resepsi">Resepsi</option>
            </select>
        </div>
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium" for="start_time">Waktu Mulai</label>
                <input type="time" id="start_time" name="start_time" required class="w-full p-2 border rounded" />
            </div>
            <div>
                <label class="block mb-1 font-medium" for="end_time">Waktu Selesai</label>
                <input type="time" id="end_time" name="end_time" required class="w-full p-2 border rounded" />
            </div>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="task">Tugas</label>
            <input type="text" id="task" name="task" required class="w-full p-2 border rounded" />
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium" for="notes">Catatan</label>
            <textarea id="notes" name="notes" class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">Tambah</button>
    </form>

    <h2 class="text-xl font-semibold mb-4">Daftar Rundown</h2>
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-primary text-white">
                <th class="p-3 text-left">ID</th>
                <th class="p-3 text-left">Segmen</th>
                <th class="p-3 text-left">Waktu Mulai</th>
                <th class="p-3 text-left">Waktu Selesai</th>
                <th class="p-3 text-left">Tugas</th>
                <th class="p-3 text-left">Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rundowns as $rundown): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo $rundown['id']; ?></td>
                <td class="p-3"><?php echo ucfirst(str_replace('_', ' ', $rundown['segment_type'])); ?></td>
                <td class="p-3"><?php echo $rundown['start_time']; ?></td>
                <td class="p-3"><?php echo $rundown['end_time']; ?></td>
                <td class="p-3"><?php echo $rundown['task']; ?></td>
                <td class="p-3"><?php echo $rundown['notes']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
