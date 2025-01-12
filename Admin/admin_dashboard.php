<?php
session_start();
$admin_id = $_SESSION['admin_id'];

// Check if the admin is logged in, otherwise redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the database connection file
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            height: 95.5%;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .sidebar .submenu {
            margin-left: 15px;
            font-size: 14px;
        }
        .header {
            width: 97.5%;
            background-color: #34495e;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header .actions a {
            color: white;
            text-decoration: none;
            background-color: #e74c3c;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ecf0f1;
        }
    </style> -->

    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
    background-color: #ecf0f1;
}

.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    height: 100vh;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar a {
    color: white;
    text-decoration: none;
    padding: 12px 20px;
    margin: 8px 0; 
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.sidebar a:hover {
    background-color: #34495e;
    transform: translateX(5px);
}

.sidebar .submenu {
    margin-left: 20px;
    font-size: 14px;
    color: #bdc3c7;
}

.sidebar .submenu a {
    display: block;
    font-size: 14px;
    margin: 1px 0;
}

.header {
    width: calc(100% - 250px);
    background-color: #34495e;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.header h1 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

.header .actions {
    display: flex;
    align-items: center;
    gap: 15px;
}

.header .actions a {
    color: white;
    text-decoration: none;
    background-color: #e74c3c;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.header .actions a:hover {
    background-color: #c0392b;
    transform: scale(1.1);
}

.main-content {
    flex-grow: 1;
    padding: 30px;
    background-color: #ecf0f1;
    overflow-y: auto;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    line-height: 1.6;
    color: #34495e;
}

.main-content h2 {
    color: #2c3e50;
    margin-bottom: 20px;
    font-size: 22px;
    border-bottom: 2px solid #bdc3c7;
    padding-bottom: 10px;
}

.main-content p {
    margin-bottom: 20px;
    color: #2c3e50;
}

@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .header {
        width: calc(100% - 200px);
    }

    .header h1 {
        font-size: 20px;
    }

    .main-content {
        padding: 20px;
    }
}

    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="admin_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="Reg_users.php"><i class="fas fa-users"></i> Registered Users</a>
        <a href="#"><i class="fas fa-file-alt"></i> Admission Applications</a>
        <div class="submenu">
            <!-- <a href="newly_applied.php"><i class="fas fa-user-plus"></i> Newly Applied</a> -->
            <a href="verified.php"><i class="fas fa-check-circle"></i> Verified</a>
            <a href="pending.php"><i class="fas fa-clock"></i> Pending</a>
            <a href="rejected.php"><i class="fas fa-times-circle"></i> Rejected</a>
        </div>
        <a href="search_application.php"><i class="fas fa-search"></i> Search Application</a>
        <a href="merit_list.php"><i class="fas fa-list"></i> Merit List</a>
        <a href="admin_profile.php"><i class="fas fa-user"></i> Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <div class="actions">
                <a href="admin_profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="content">
            <h2>Welcome, Admin!</h2>
            <!-- <p>Use the sidebar to navigate through the dashboard.</p> -->
        </div>
    </div>
</body>
</html>
