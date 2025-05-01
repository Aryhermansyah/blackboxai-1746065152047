<?php
global $DUMMY_RUNDOWN;
global $DUMMY_VENDORS;
global $DUMMY_TEAM;

// Helper function to get icon for each segment
function getSegmentIcon($segment) {
    switch($segment) {
        case 'loading_crew':
            return 'fas fa-truck-loading';
        case 'akad':
            return 'fas fa-ring';
        case 'temu_manten':
            return 'fas fa-heart';
        case 'resepsi':
            return 'fas fa-glass-cheers';
        default:
            return 'fas fa-calendar';
    }
}

// Helper function to get title for each segment
function getSegmentTitle($segment) {
    switch($segment) {
        case 'loading_crew':
            return 'Loading Crew';
        case 'akad':
            return 'Akad Ceremony';
        case 'temu_manten':
            return 'Temu Manten';
        case 'resepsi':
            return 'Reception';
        default:
            return ucfirst($segment);
    }
}

// Sample assignments data (in real app, this would come from database)
$ASSIGNMENTS = [
    'loading_crew' => [
        'vendors' => [
            ['name' => 'Elegant Decor', 'task' => 'Setup main decoration'],
        ],
        'team' => [
            ['name' => 'Sarah Johnson', 'task' => 'Overall coordination and briefing'],
            ['name' => 'Lisa Chen', 'task' => 'Supervise decoration setup'],
        ]
    ],
    'akad' => [
        'vendors' => [
            ['name' => 'Divine Photography', 'task' => 'Ceremony documentation'],
        ],
        'team' => [
            ['name' => 'Sarah Johnson', 'task' => 'Ceremony coordination'],
            ['name' => 'Michael Lee', 'task' => 'Guest coordination'],
        ]
    ],
    'temu_manten' => [
        'vendors' => [
            ['name' => 'Divine Photography', 'task' => 'Traditional ceremony documentation'],
        ],
        'team' => [
            ['name' => 'Michael Lee', 'task' => 'Guide traditional ceremony'],
            ['name' => 'Lisa Chen', 'task' => 'Coordinate family members'],
        ]
    ],
    'resepsi' => [
        'vendors' => [
            ['name' => 'Heavenly Catering', 'task' => 'Manage food service'],
            ['name' => 'Sound Master', 'task' => 'Manage sound and entertainment'],
        ],
        'team' => [
            ['name' => 'Sarah Johnson', 'task' => 'Guest reception coordination'],
            ['name' => 'John Smith', 'task' => 'Technical coordination'],
        ]
    ]
];
?>

<div class="max-w-4xl mx-auto">
    <!-- Page Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold playfair text-gray-800 mb-2">Wedding Timeline</h1>
        <p class="text-gray-600">Complete rundown of the wedding ceremony</p>
    </div>

    <!-- Timeline Segments -->
    <div class="space-y-6">
        <?php foreach ($DUMMY_RUNDOWN as $segment => $tasks): ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Segment Header -->
            <div class="bg-primary/10 p-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center mr-4">
                        <i class="<?php echo getSegmentIcon($segment); ?> text-primary text-xl"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">
                        <?php echo getSegmentTitle($segment); ?>
                    </h2>
                </div>
            </div>

            <!-- Tasks List -->
            <div class="divide-y divide-gray-100">
                <?php foreach ($tasks as $task): ?>
                <div class="p-4 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-24 text-sm font-medium text-gray-600">
                            <?php echo $task['time']; ?>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-medium text-gray-800 mb-1">
                                <?php echo $task['task']; ?>
                            </h3>
                            <?php if (!empty($task['notes'])): ?>
                            <p class="text-sm text-gray-600 mb-3">
                                <i class="fas fa-info-circle mr-1 text-primary"></i>
                                <?php echo $task['notes']; ?>
                            </p>
                            <?php endif; ?>

                            <!-- Assignments Section -->
                            <?php if (isset($ASSIGNMENTS[$segment])): ?>
                            <div class="mt-3 space-y-3">
                                <!-- Vendors -->
                                <?php if (!empty($ASSIGNMENTS[$segment]['vendors'])): ?>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-store text-primary mr-1"></i>
                                        Vendors on Duty:
                                    </h4>
                                    <div class="space-y-2">
                                        <?php foreach ($ASSIGNMENTS[$segment]['vendors'] as $vendor): ?>
                                        <div class="flex items-start">
                                            <div class="w-32 text-sm font-medium text-gray-600">
                                                <?php echo $vendor['name']; ?>
                                            </div>
                                            <div class="flex-grow text-sm text-gray-600">
                                                <?php echo $vendor['task']; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Team Members -->
                                <?php if (!empty($ASSIGNMENTS[$segment]['team'])): ?>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-users text-primary mr-1"></i>
                                        Team Assignments:
                                    </h4>
                                    <div class="space-y-2">
                                        <?php foreach ($ASSIGNMENTS[$segment]['team'] as $member): ?>
                                        <div class="flex items-start">
                                            <div class="w-32 text-sm font-medium text-gray-600">
                                                <?php echo $member['name']; ?>
                                            </div>
                                            <div class="flex-grow text-sm text-gray-600">
                                                <?php echo $member['task']; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- Task Status -->
                        <div class="flex-shrink-0 ml-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Ready
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Download Button -->
    <div class="text-center mt-8">
        <button class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
            <i class="fas fa-download mr-2"></i>
            Download Timeline PDF
        </button>
    </div>
</div>
