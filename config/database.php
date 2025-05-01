<?php
$host = 'localhost';
$dbname = 'wedding_organizer';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Dummy data for preview
$DUMMY_WEDDING = [
    'couple_names' => 'Ahmad & Fatima',
    'event_date' => '2024-03-15',
    'venue' => 'Grand Ballroom Hotel Mulia',
    'location' => 'Jakarta Selatan',
    'cover_photo' => 'https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg'
];

// Biodata Pengantin
$DUMMY_BIODATA = [
    'groom' => [
        'name' => 'Ahmad Fadillah',
        'father' => 'H. Sulaiman',
        'mother' => 'Hj. Aminah',
        'child_number' => 'Anak ke-2 dari 3 bersaudara',
        'address' => 'Jl. Melati No. 123, Jakarta Selatan',
        'phone' => '081234567890',
        'instagram' => '@ahmadfadillah'
    ],
    'bride' => [
        'name' => 'Fatima Azzahra',
        'father' => 'H. Abdullah',
        'mother' => 'Hj. Khadijah',
        'child_number' => 'Anak ke-1 dari 2 bersaudara',
        'address' => 'Jl. Anggrek No. 456, Jakarta Timur',
        'phone' => '089876543210',
        'instagram' => '@fatimaazzahra'
    ]
];

// Event Summary
$DUMMY_EVENT_SUMMARY = [
    'akad' => [
        'time' => '09:00 - 10:00',
        'date' => '15 March 2024',
        'guests' => 50
    ],
    'temu' => [
        'time' => '10:30 - 11:30',
        'date' => '15 March 2024',
        'guests' => 100
    ],
    'resepsi' => [
        'time' => '12:00 - 15:00',
        'date' => '15 March 2024',
        'guests' => 500
    ]
];

$DUMMY_RUNDOWN = [
    'loading_crew' => [
        ['time' => '06:00 - 07:00', 'task' => 'Team Briefing', 'notes' => 'All crew must arrive on time'],
        ['time' => '07:00 - 08:00', 'task' => 'Venue Setup', 'notes' => 'Check all decorations']
    ],
    'akad' => [
        ['time' => '08:00 - 09:00', 'task' => 'Preparation', 'notes' => 'Bride & Groom makeup'],
        ['time' => '09:00 - 10:00', 'task' => 'Akad Ceremony', 'notes' => 'Main ceremony']
    ],
    'temu_manten' => [
        ['time' => '10:30 - 11:00', 'task' => 'Temu Manten Ceremony', 'notes' => 'Traditional meeting ceremony'],
        ['time' => '11:00 - 11:30', 'task' => 'Family Photos', 'notes' => 'Group photos with family']
    ],
    'resepsi' => [
        ['time' => '12:00 - 13:00', 'task' => 'Guest Reception', 'notes' => 'Welcome drinks and snacks'],
        ['time' => '13:00 - 15:00', 'task' => 'Main Reception', 'notes' => 'Lunch and entertainment']
    ]
];

$DUMMY_VENDORS = [
    [
        'name' => 'Elegant Decor',
        'contact' => '081234567890',
        'email' => 'elegant@decor.com',
        'services' => ['5 Round Tables', 'Stage Decoration', 'Flower Arrangements', 'Lighting Setup']
    ],
    [
        'name' => 'Divine Photography',
        'contact' => '087654321098',
        'email' => 'divine@photo.com',
        'services' => ['8 Hours Coverage', '2 Photographers', 'Drone Shots', 'Same Day Edit']
    ]
];

$DUMMY_TEAM = [
    [
        'name' => 'Sarah Johnson',
        'role' => 'Wedding Coordinator',
        'contact' => '081122334455'
    ],
    [
        'name' => 'Michael Lee',
        'role' => 'Assistant Coordinator',
        'contact' => '082233445566'
    ]
];

$DUMMY_COORDINATORS = [
    [
        'name' => 'Pak Bambang',
        'task' => 'Family Coordinator',
        'contact' => '081234567890'
    ],
    [
        'name' => 'Ibu Siti',
        'task' => 'Guest Reception',
        'contact' => '087654321098'
    ]
];

$DUMMY_PLAYLIST = [
    [
        'title' => 'Perfect',
        'artist' => 'Ed Sheeran',
        'url' => 'https://youtube.com/perfect'
    ],
    [
        'title' => 'Marry You',
        'artist' => 'Bruno Mars',
        'url' => 'https://youtube.com/marryyou'
    ]
];
?>
