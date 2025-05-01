<?php
// Using dummy data from database.php
global $DUMMY_WEDDING;
global $DUMMY_BIODATA;
global $DUMMY_EVENT_SUMMARY;
?>

<!-- Hero Section with Couple Photo -->
<div class="relative h-[300px] md:h-[400px] rounded-b-3xl overflow-hidden mb-8 hero-section">
    <img src="<?php echo $DUMMY_WEDDING['cover_photo']; ?>" 
         alt="Couple Photo" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 p-6 text-white animate-slide-up">
        <h1 class="text-3xl md:text-4xl font-bold playfair mb-2">
            <?php echo $DUMMY_WEDDING['couple_names']; ?>
        </h1>
        <p class="text-lg mb-1">
            <i class="far fa-calendar-alt mr-2"></i>
            <?php echo date('d F Y', strtotime($DUMMY_WEDDING['event_date'])); ?>
        </p>
        <p class="text-lg">
            <i class="fas fa-map-marker-alt mr-2"></i>
            <?php echo $DUMMY_WEDDING['venue']; ?>
        </p>
    </div>
</div>

<!-- Biodata Section -->
<div class="grid md:grid-cols-2 gap-6 mb-8">
    <!-- Groom's Biodata -->
    <div class="bg-white rounded-xl shadow-md p-6 hover-lift animate-slide-in">
        <h2 class="text-xl font-semibold mb-4 flex items-center text-gray-800">
            <i class="fas fa-user text-primary mr-2"></i>
            Biodata Mempelai Pria
        </h2>
        <div class="space-y-3">
            <?php 
            $i = 1;
            foreach ($DUMMY_BIODATA['groom'] as $key => $value): 
            ?>
            <div class="animate-slide-in stagger-<?php echo $i; ?>">
                <label class="text-sm font-medium text-gray-600"><?php echo ucfirst(str_replace('_', ' ', $key)); ?>:</label>
                <p class="text-gray-800"><?php echo $value; ?></p>
            </div>
            <?php 
            $i++;
            endforeach; 
            ?>
        </div>
    </div>

    <!-- Bride's Biodata -->
    <div class="bg-white rounded-xl shadow-md p-6 hover-lift animate-slide-in stagger-1">
        <h2 class="text-xl font-semibold mb-4 flex items-center text-gray-800">
            <i class="fas fa-user text-primary mr-2"></i>
            Biodata Mempelai Wanita
        </h2>
        <div class="space-y-3">
            <?php 
            $i = 1;
            foreach ($DUMMY_BIODATA['bride'] as $key => $value): 
            ?>
            <div class="animate-slide-in stagger-<?php echo $i; ?>">
                <label class="text-sm font-medium text-gray-600"><?php echo ucfirst(str_replace('_', ' ', $key)); ?>:</label>
                <p class="text-gray-800"><?php echo $value; ?></p>
            </div>
            <?php 
            $i++;
            endforeach; 
            ?>
        </div>
    </div>
</div>

<!-- Event Summary Section -->
<div class="bg-white rounded-xl shadow-md p-6 mb-8 animate-scale-in stagger-2">
    <h2 class="text-xl font-semibold mb-4 flex items-center text-gray-800">
        <i class="fas fa-calendar-check text-primary mr-2"></i>
        Ringkasan Acara
    </h2>
    
    <!-- Date & Time -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <h3 class="font-medium text-gray-800 mb-2">Tanggal & Waktu</h3>
            <div class="space-y-3">
                <?php 
                $i = 1;
                foreach ($DUMMY_EVENT_SUMMARY as $event => $details): 
                ?>
                <div class="flex items-start animate-slide-in stagger-<?php echo $i; ?>">
                    <div class="w-24 text-sm font-medium text-gray-600"><?php echo ucfirst($event); ?></div>
                    <div class="flex-1">
                        <p class="text-gray-800"><?php echo $details['time']; ?></p>
                        <p class="text-sm text-gray-600"><?php echo $details['date']; ?></p>
                    </div>
                </div>
                <?php 
                $i++;
                endforeach; 
                ?>
            </div>
        </div>
        
        <!-- Guest Count -->
        <div>
            <h3 class="font-medium text-gray-800 mb-2">Perkiraan Tamu</h3>
            <div class="space-y-3">
                <?php 
                $i = 1;
                foreach ($DUMMY_EVENT_SUMMARY as $event => $details): 
                ?>
                <div class="flex items-center animate-slide-in stagger-<?php echo $i; ?>">
                    <div class="w-24 text-sm font-medium text-gray-600"><?php echo ucfirst($event); ?></div>
                    <div class="flex items-center text-gray-800">
                        <i class="fas fa-users text-primary mr-2"></i>
                        <?php echo $details['guests']; ?> Tamu
                    </div>
                </div>
                <?php 
                $i++;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Main Menu Cards -->
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
    <!-- Moodboard Card -->
    <div class="bg-white rounded-xl shadow-md p-4 hover-scale animate-scale-in stagger-1">
        <a href="?page=media&tab=moodboard" class="block text-center">
            <div class="w-12 h-12 mx-auto mb-2 bg-primary/20 rounded-full flex items-center justify-center">
                <i class="fas fa-palette text-primary text-xl"></i>
            </div>
            <h3 class="text-gray-800 font-medium">Moodboard</h3>
            <p class="text-sm text-gray-500">Wedding Inspiration</p>
        </a>
    </div>

    <!-- Music Playlist Card -->
    <div class="bg-white rounded-xl shadow-md p-4 hover-scale animate-scale-in stagger-2">
        <a href="?page=media&tab=playlist" class="block text-center">
            <div class="w-12 h-12 mx-auto mb-2 bg-primary/20 rounded-full flex items-center justify-center">
                <i class="fas fa-music text-primary text-xl"></i>
            </div>
            <h3 class="text-gray-800 font-medium">Music Playlist</h3>
            <p class="text-sm text-gray-500">Wedding Songs</p>
        </a>
    </div>

    <!-- Family Photo Plan Card -->
    <div class="bg-white rounded-xl shadow-md p-4 hover-scale animate-scale-in stagger-3">
        <a href="?page=media&tab=family-photo" class="block text-center">
            <div class="w-12 h-12 mx-auto mb-2 bg-primary/20 rounded-full flex items-center justify-center">
                <i class="fas fa-camera text-primary text-xl"></i>
            </div>
            <h3 class="text-gray-800 font-medium">Family Photo</h3>
            <p class="text-sm text-gray-500">Photo Sessions</p>
        </a>
    </div>
</div>

<!-- Quick Access Section -->
<div class="grid md:grid-cols-2 gap-6 mb-8">
    <!-- Today's Schedule -->
    <div class="bg-white rounded-xl shadow-md p-6 hover-lift animate-slide-in stagger-4">
        <h2 class="text-xl font-semibold mb-4 flex items-center text-gray-800">
            <i class="fas fa-clock mr-2 text-primary"></i>
            Today's Schedule
        </h2>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="w-20 text-sm font-medium text-gray-600">09:00 AM</div>
                <div>
                    <h4 class="font-medium text-gray-800">Akad Ceremony</h4>
                    <p class="text-sm text-gray-600">Main Ballroom</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-20 text-sm font-medium text-gray-600">11:00 AM</div>
                <div>
                    <h4 class="font-medium text-gray-800">Photo Session</h4>
                    <p class="text-sm text-gray-600">Garden Area</p>
                </div>
            </div>
        </div>
        <a href="?page=rundown" class="mt-4 inline-block text-primary hover:text-primary/80">
            View Full Schedule →
        </a>
    </div>

    <!-- Important Contacts -->
    <div class="bg-white rounded-xl shadow-md p-6 hover-lift animate-slide-in stagger-5">
        <h2 class="text-xl font-semibold mb-4 flex items-center text-gray-800">
            <i class="fas fa-phone-alt mr-2 text-primary"></i>
            Important Contacts
        </h2>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-user text-primary"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Wedding Coordinator</h4>
                    <p class="text-sm text-gray-600">Sarah - 081122334455</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-camera text-primary"></i>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Photographer</h4>
                    <p class="text-sm text-gray-600">Michael - 082233445566</p>
                </div>
            </div>
        </div>
        <a href="?page=team" class="mt-4 inline-block text-primary hover:text-primary/80">
            View All Contacts →
        </a>
    </div>
</div>
