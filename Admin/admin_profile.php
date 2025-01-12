<?php
// Start the session
session_start();
$admin_id = $_SESSION['admin_id'];

// Check if the admin is logged in, otherwise redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit();
}

// Include the database connection file
include 'db_connect.php';

// Fetch the user's current details from the database
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admins WHERE id = $admin_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Handle form submission for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Update the user's details in the database
    if (!empty($password)) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE admins SET name='$name', email='$email', password='$hashed_password' WHERE id=$admin_id";
    } else {
        $update_sql = "UPDATE admins SET name='$name', email='$email' WHERE id=$admin_id";
    }

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Profile updated successfully!');</script>";
        // Update session variables
        $_SESSION['name'] = $name;
        // Refresh the page to reflect changes
        header("Refresh:0");
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- <link rel="stylesheet" href="CSS/user-profile-style.css"> -->
    <style>
        /* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

/* Root Variables for Colors */
:root {
    --primary-color: #2c7fb8; /* Elegant blue */
    --secondary-color: #2e2e2e; /* Dark gray */
    --background-color: #f3f6fa; /* Light grayish-blue */
    --text-color: #525252; /* Medium gray */
    --error-color: #d9534f; /* Subtle red */
    --button-hover-color: #1b6a93; /* Darker shade of primary */
}

/* General Styles */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #0089b7;
    background-color: #;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container Styling */
.container {
    width: 100%;
    max-width: 600px;
    padding: 20px;
    height: 600px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    border: 1px solid #e1e8ed; /* Subtle border for a polished look */
}

/* Access Box Styling */
.access-box {
    padding: 40px;
}

.access-box h2 {
    margin-bottom: 25px;
    color: var(--secondary-color);
    text-align: center;
    font-size: 2.5em;
    font-weight: 700;
    letter-spacing: 1px; /* Subtle spacing for elegance */
}

/* Form Styles */
form label {
    display: block;
    font-weight: 500;
    color: var(--text-color);
    margin-bottom: 8px;
}

form input {
    width: 92%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccd6dd;
    border-radius: 6px;
    font-size: 1.2em;
    background-color: #f9fbfd; /* Light background for inputs */
    color: var(--secondary-color);
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 6px rgba(44, 127, 184, 0.4);
}

/* Button Styles */
form button {
    width: 100%;
    padding: 15px;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1.3em;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s, transform 0.2s;
}

form button:hover {
    background-color: var(--button-hover-color);
    transform: translateY(-2px); /* Subtle elevation effect */
}

.back-btn {
  background-color: var(--primary-color);/* Blue background color */
  color: #fff; /* White text color */
  font-weight: 600;
  border: none; /* Remove default border */
  padding: 10px 20px; /* Add some padding for better clickability */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer; /* Change cursor to pointer on hover */
  text-decoration: none;
}

.back-btn:hover {
    background-color: var(--button-hover-color);
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <div class="container profile-container">
        <button class="back-btn">
            <a href="admin_dashboard.php">Back</a>
        </button>

        <h1>Admin Profile</h1>
        <div class="profile-box">
            <form method="POST">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="name" value="<?php echo $user['name']; ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

                <label for="password">New Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password" placeholder="Enter new password">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</body>

</html>