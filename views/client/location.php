<?php
global $DUMMY_WEDDING;
?>

<div class="max-w-4xl mx-auto">
    <!-- Page Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold playfair text-gray-800 mb-2">Venue & Location</h1>
        <p class="text-gray-600">All the details about your wedding venue</p>
    </div>

    <!-- Venue Card -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <!-- Venue Image -->
        <div class="relative h-48 md:h-64">
            <img src="https://images.pexels.com/photos/169193/pexels-photo-169193.jpeg" 
                 alt="Venue" 
                 class="w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                <h2 class="text-white text-2xl font-semibold"><?php echo $DUMMY_WEDDING['venue']; ?></h2>
                <p class="text-white/90">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <?php echo $DUMMY_WEDDING['location']; ?>
                </p>
            </div>
        </div>

        <!-- Venue Details -->
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Venue Features</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-users w-6 text-primary"></i>
                                <span>500 Capacity</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-parking w-6 text-primary"></i>
                                <span>Free Parking</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-wind w-6 text-primary"></i>
                                <span>AC Available</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-wifi w-6 text-primary"></i>
                                <span>Free WiFi</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact Person</h3>
                        <div class="space-y-2">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-user w-6 text-primary"></i>
                                <span>Mr. John (Venue Manager)</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-phone-alt w-6 text-primary"></i>
                                <span>081234567890</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Event Schedule</h3>
                        <div class="space-y-2">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-calendar-alt w-6 text-primary"></i>
                                <span><?php echo date('l, d F Y', strtotime($DUMMY_WEDDING['event_date'])); ?></span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-clock w-6 text-primary"></i>
                                <span>09:00 AM - 05:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Additional Notes</h3>
                        <p class="text-gray-600">
                            Early access available for decoration team. Please coordinate with the venue manager for setup arrangements.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps Integration -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Location Map</h3>
            <div class="aspect-video bg-gray-100 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-4xl text-primary mb-2"></i>
                    <p class="text-gray-600">Interactive map will be displayed here</p>
                    <a href="https://maps.google.com" target="_blank" 
                       class="inline-flex items-center mt-2 text-primary hover:text-primary/80">
                        <i class="fas fa-external-link-alt mr-1"></i>
                        Open in Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Directions -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">How to Get There</h3>
            <div class="space-y-4">
                <!-- By Car -->
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-car text-primary"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800 mb-1">By Car</h4>
                        <p class="text-gray-600">15 minutes from city center. Free parking available on-site.</p>
                    </div>
                </div>

                <!-- By Public Transport -->
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-bus text-primary"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800 mb-1">By Public Transport</h4>
                        <p class="text-gray-600">Bus stop within 5 minutes walking distance. Take bus number 101 or 102.</p>
                    </div>
                </div>

                <!-- Landmarks -->
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-landmark text-primary"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800 mb-1">Nearby Landmarks</h4>
                        <p class="text-gray-600">Next to Central Park Mall, opposite to City Hospital.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
