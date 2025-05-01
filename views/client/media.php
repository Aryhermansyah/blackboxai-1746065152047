<?php
global $DUMMY_PLAYLIST;

// Get active tab from URL parameter
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'gallery';
?>

<div class="max-w-4xl mx-auto">
    <!-- Page Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold playfair text-gray-800 mb-2">Media Center</h1>
        <p class="text-gray-600">Photos, music, and planning materials</p>
    </div>

    <!-- Tab Navigation -->
    <div class="flex overflow-x-auto mb-6 bg-white rounded-lg shadow-md">
        <a href="?page=media&tab=gallery" 
           class="flex-1 px-4 py-3 text-center border-b-2 min-w-[120px] <?php echo $active_tab == 'gallery' ? 'border-primary text-primary' : 'border-transparent text-gray-600 hover:text-primary'; ?>">
            <i class="fas fa-images mr-2"></i>
            Gallery
        </a>
        <a href="?page=media&tab=moodboard" 
           class="flex-1 px-4 py-3 text-center border-b-2 min-w-[120px] <?php echo $active_tab == 'moodboard' ? 'border-primary text-primary' : 'border-transparent text-gray-600 hover:text-primary'; ?>">
            <i class="fas fa-palette mr-2"></i>
            Moodboard
        </a>
        <a href="?page=media&tab=playlist" 
           class="flex-1 px-4 py-3 text-center border-b-2 min-w-[120px] <?php echo $active_tab == 'playlist' ? 'border-primary text-primary' : 'border-transparent text-gray-600 hover:text-primary'; ?>">
            <i class="fas fa-music mr-2"></i>
            Playlist
        </a>
        <a href="?page=media&tab=family-photo" 
           class="flex-1 px-4 py-3 text-center border-b-2 min-w-[120px] <?php echo $active_tab == 'family-photo' ? 'border-primary text-primary' : 'border-transparent text-gray-600 hover:text-primary'; ?>">
            <i class="fas fa-camera mr-2"></i>
            Family Photo
        </a>
    </div>

    <!-- Tab Content -->
    <div class="bg-white rounded-xl shadow-md p-6">
        <?php if ($active_tab == 'gallery'): ?>
            <!-- Photo Gallery -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php
                $sample_photos = [
                    'https://images.pexels.com/photos/1114425/pexels-photo-1114425.jpeg',
                    'https://images.pexels.com/photos/1702373/pexels-photo-1702373.jpeg',
                    'https://images.pexels.com/photos/1589216/pexels-photo-1589216.jpeg',
                    'https://images.pexels.com/photos/1589825/pexels-photo-1589825.jpeg',
                    'https://images.pexels.com/photos/1589822/pexels-photo-1589822.jpeg',
                    'https://images.pexels.com/photos/1589827/pexels-photo-1589827.jpeg'
                ];
                foreach ($sample_photos as $photo): 
                ?>
                <div class="aspect-square rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="<?php echo $photo; ?>" alt="Wedding Photo" class="w-full h-full object-cover">
                </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($active_tab == 'moodboard'): ?>
            <!-- Moodboard -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php
                $moodboard_items = [
                    ['image' => 'https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg', 'title' => 'Venue Decoration'],
                    ['image' => 'https://images.pexels.com/photos/169211/pexels-photo-169211.jpeg', 'title' => 'Table Setting'],
                    ['image' => 'https://images.pexels.com/photos/169203/pexels-photo-169203.jpeg', 'title' => 'Flower Arrangement'],
                    ['image' => 'https://images.pexels.com/photos/169198/pexels-photo-169198.jpeg', 'title' => 'Color Theme'],
                ];
                foreach ($moodboard_items as $item):
                ?>
                <div class="relative group">
                    <div class="aspect-square rounded-lg overflow-hidden shadow-md">
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white text-sm font-medium"><?php echo $item['title']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($active_tab == 'playlist'): ?>
            <!-- Music Playlist -->
            <div class="space-y-4">
                <?php foreach ($DUMMY_PLAYLIST as $index => $song): ?>
                <div class="flex items-center bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors">
                    <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-music text-primary"></i>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-medium text-gray-800"><?php echo $song['title']; ?></h3>
                        <p class="text-sm text-gray-600"><?php echo $song['artist']; ?></p>
                    </div>
                    <a href="<?php echo $song['url']; ?>" target="_blank" 
                       class="px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($active_tab == 'family-photo'): ?>
            <!-- Family Photo Plan -->
            <div class="space-y-6">
                <?php
                $photo_sessions = [
                    [
                        'title' => 'Immediate Family',
                        'time' => '11:00 AM',
                        'participants' => ['Bride\'s Parents', 'Groom\'s Parents', 'Siblings'],
                        'location' => 'Main Stage'
                    ],
                    [
                        'title' => 'Extended Family',
                        'time' => '11:30 AM',
                        'participants' => ['Aunts & Uncles', 'Cousins'],
                        'location' => 'Garden Area'
                    ]
                ];
                foreach ($photo_sessions as $session):
                ?>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="font-medium text-gray-800"><?php echo $session['title']; ?></h3>
                        <span class="text-sm text-gray-600"><?php echo $session['time']; ?></span>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <?php echo implode(', ', $session['participants']); ?>
                        </p>
                        <p class="text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <?php echo $session['location']; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Upload Button -->
        <div class="text-center mt-8">
            <button class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                <i class="fas fa-upload mr-2"></i>
                Upload New Media
            </button>
        </div>
    </div>
</div>
