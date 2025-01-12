<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit();
}

// Include database connection
include 'db_connect.php';

// Get the logged-in student's ID from the session
$student_id = $_SESSION['student_id'];

// Fetch application status from the database
$query = "SELECT program, status FROM stud_admission WHERE student_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the student has submitted an application
if ($result->num_rows > 0) {
    $application = $result->fetch_assoc();
    $program = htmlspecialchars($application['program']);
    $status = htmlspecialchars($application['status']);
    $statusMessage = "Your application for <strong>$program</strong> is currently: <strong>$status</strong>.";
} else {
    $statusMessage = "You have not applied for any program yet.";
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        :root {
            --lighting-color: #0089b7; /*for background-color*/
            --dark-color: #084a74; 
            --darker-color: #003251; /*for container*/
            --secondary-color: #fff700; /*for btn*/
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Poppins, sans-serif;
            background-color: var(--lighting-color);
            margin: 0;
            padding: 0;
        }


        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 900px;
            height: 300px;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .status-message {
            margin-top: 30px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        .status-message strong {
            color: #007bff;
        }
        .btn-back {
            display: inline-block;
            margin-top: 35px;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 20px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Application Status</h1>
        <div class="status-message">
            <?php echo $statusMessage; ?>
        </div>
        <a href="stud_dashboard.php" class="btn-back">Back to Dashboard</a>
    </div>
</body>
</html>
