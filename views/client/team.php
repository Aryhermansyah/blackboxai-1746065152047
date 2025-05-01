<?php
global $DUMMY_TEAM;
global $DUMMY_COORDINATORS;
?>

<div class="max-w-4xl mx-auto">
    <!-- Page Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold playfair text-gray-800 mb-2">Team & Coordinators</h1>
        <p class="text-gray-600">Meet the people making your special day perfect</p>
    </div>

    <!-- WO Team Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-users text-primary mr-2"></i>
            Wedding Organizer Team
        </h2>
        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach ($DUMMY_TEAM as $member): ?>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <!-- Team Member Avatar -->
                        <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-primary text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800"><?php echo $member['name']; ?></h3>
                            <p class="text-primary font-medium"><?php echo $member['role']; ?></p>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-phone-alt w-5 text-primary"></i>
                            <span><?php echo $member['contact']; ?></span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-envelope w-5 text-primary"></i>
                            <span><?php echo strtolower(str_replace(' ', '.', $member['name'])) ?>@wedding.com</span>
                        </div>
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="mt-4 flex space-x-2">
                        <button class="flex-1 px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                            <i class="fas fa-phone-alt mr-2"></i>
                            Call
                        </button>
                        <button class="flex-1 px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                            <i class="fas fa-comment-alt mr-2"></i>
                            Chat
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Family Coordinators Section -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user-friends text-primary mr-2"></i>
            Family Coordinators
        </h2>
        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach ($DUMMY_COORDINATORS as $coordinator): ?>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <!-- Coordinator Avatar -->
                        <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-tie text-primary text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800"><?php echo $coordinator['name']; ?></h3>
                            <p class="text-primary font-medium"><?php echo $coordinator['task']; ?></p>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-phone-alt w-5 text-primary"></i>
                            <span><?php echo $coordinator['contact']; ?></span>
                        </div>
                    </div>

                    <!-- Quick Action Buttons -->
                    <div class="mt-4 flex space-x-2">
                        <button class="flex-1 px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                            <i class="fas fa-phone-alt mr-2"></i>
                            Call
                        </button>
                        <button class="flex-1 px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 transition-colors">
                            <i class="fas fa-comment-alt mr-2"></i>
                            Chat
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Add Team Member Button (for admin) -->
    <div class="text-center mt-8">
        <button class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            Add Team Member
        </button>
    </div>
</div>
