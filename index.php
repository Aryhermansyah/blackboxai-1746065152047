<?php
session_start();
require_once 'config/database.php';
require_once 'includes/header.php';

// Get current page and validate
$valid_pages = ['dashboard', 'rundown', 'vendors', 'media', 'team', 'location'];
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page = in_array($page, $valid_pages) ? $page : 'dashboard';

// Set current page for navigation
$current_page = $page;

// Handle routing
switch($page) {
    case 'dashboard':
        include 'views/client/dashboard.php';
        break;
    case 'rundown':
        include 'views/client/rundown.php';
        break;
    case 'vendors':
        include 'views/client/vendors.php';
        break;
    case 'media':
        include 'views/client/media.php';
        break;
    case 'team':
        include 'views/client/team.php';
        break;
    case 'location':
        include 'views/client/location.php';
        break;
    default:
        include 'views/client/dashboard.php';
}

require_once 'includes/footer.php';
?>
