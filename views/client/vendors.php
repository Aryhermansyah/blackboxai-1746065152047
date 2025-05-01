<?php
global $DUMMY_VENDORS;
?>

<div class="max-w-4xl mx-auto">
    <!-- Page Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold playfair text-gray-800 mb-2">Wedding Vendors</h1>
        <p class="text-gray-600">All services and suppliers for your special day</p>
    </div>

    <!-- Vendors Grid -->
    <div class="grid md:grid-cols-2 gap-6">
        <?php foreach ($DUMMY_VENDORS as $vendor): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <!-- Vendor Header -->
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-1"><?php echo $vendor['name']; ?></h2>
                        <div class="space-y-1">
                            <p class="text-sm text-gray-600 flex items-center">
                                <i class="fas fa-phone-alt w-5 text-primary"></i>
                                <?php echo $vendor['contact']; ?>
                            </p>
                            <p class="text-sm text-gray-600 flex items-center">
                                <i class="fas fa-envelope w-5 text-primary"></i>
                                <?php echo $vendor['email']; ?>
                            </p>
                        </div>
                    </div>
                    <!-- Vendor Category Icon -->
                    <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                        <i class="<?php echo strpos(strtolower($vendor['name']), 'photo') !== false ? 'fas fa-camera' : 'fas fa-store'; ?> text-primary text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Services List -->
            <div class="bg-gray-50 px-6 py-4">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Services Provided:</h3>
                <div class="grid grid-cols-2 gap-2">
                    <?php foreach ($vendor['services'] as $service): ?>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-check text-primary mr-2"></i>
                        <?php echo $service; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="px-6 py-4 bg-white border-t border-gray-100 flex justify-between">
                <button class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                    <i class="fas fa-phone-alt mr-2"></i>
                    Call
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Email
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                    <i class="fas fa-comment-alt mr-2"></i>
                    Chat
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Add Vendor Button (for admin) -->
    <div class="text-center mt-8">
        <button class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Add New Vendor
        </button>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-3 gap-4 mt-8">
        <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <div class="text-3xl font-bold text-primary mb-1"><?php echo count($DUMMY_VENDORS); ?></div>
            <div class="text-sm text-gray-600">Total Vendors</div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <div class="text-3xl font-bold text-primary mb-1">8</div>
            <div class="text-sm text-gray-600">Services</div>
        </div>
        <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <div class="text-3xl font-bold text-primary mb-1">100%</div>
            <div class="text-sm text-gray-600">Confirmed</div>
        </div>
    </div>
</div>
