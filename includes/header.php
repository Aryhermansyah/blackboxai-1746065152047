<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Organizer</title>
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💒</text></svg>">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F8B3C5',   // Light Pink
                        secondary: '#FFE5E5',  // Lighter Pink
                        accent: '#957DAD',     // Light Purple
                        neutral: '#F9F5F6',    // Off White
                    },
                    fontFamily: {
                        playfair: ['Playfair Display', 'serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Base Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9F5F6;
        }
        .playfair {
            font-family: 'Playfair Display', serif;
        }

        /* Animation Keyframes */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { 
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .animate-slide-up {
            animation: slideUp 0.5s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out forwards;
        }

        /* Staggered Animation Classes */
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }
        .stagger-6 { animation-delay: 0.6s; }
        .stagger-7 { animation-delay: 0.7s; }

        /* Hover Effects */
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Component Animations */
        .card {
            animation: scaleIn 0.5s ease-out;
        }

        .hero-section {
            animation: fadeIn 1s ease-out;
        }

        .timeline-item {
            animation: slideIn 0.5s ease-out;
        }

        /* Navigation Animations */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: currentColor;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Mobile Navigation -->
    <nav class="bg-white shadow-lg fixed bottom-0 w-full md:hidden z-50">
        <div class="flex justify-around items-center py-3">
            <?php
            $nav_items = [
                'dashboard' => ['Home', 'fa-home'],
                'rundown' => ['Rundown', 'fa-calendar-alt'],
                'vendors' => ['Vendors', 'fa-store'],
                'media' => ['Media', 'fa-images'],
                'team' => ['Team', 'fa-users']
            ];
            
            foreach ($nav_items as $key => $item): 
                global $page;
                $is_active = $page === $key;
            ?>
            <a href="?page=<?php echo $key; ?>" 
               class="flex flex-col items-center nav-link <?php echo $is_active ? 'text-primary' : 'text-gray-600 hover:text-primary'; ?>">
                <i class="fas <?php echo $item[1]; ?> text-xl"></i>
                <span class="text-xs mt-1"><?php echo $item[0]; ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Desktop Navigation -->
    <nav class="hidden md:block bg-white shadow-lg fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <span class="text-2xl font-semibold text-primary playfair animate-fade-in">Wedding Organizer</span>
                </div>
                <div class="flex space-x-8">
                    <?php foreach ($nav_items as $key => $item): 
                        $is_active = $page === $key;
                    ?>
                    <a href="?page=<?php echo $key; ?>" 
                       class="nav-link <?php echo $is_active ? 'text-primary' : 'text-gray-600 hover:text-primary'; ?>">
                        <?php echo $item[0]; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="container mx-auto px-4 pb-20 md:pb-0 md:pt-20">
