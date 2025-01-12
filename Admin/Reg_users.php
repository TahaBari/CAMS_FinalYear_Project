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

// Fetch data from users_reg table
$sql = "SELECT * FROM users_reg";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 900px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #2c3e50;
            color: white;
        }
        .btn {
            padding: 8px 12px;
            color: white;
            background-color: #e74c3c;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #c0392b;
        }
    </style> -->

    <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 20px;
    /* background-color: #f5f7fa; */
    background-color: #0089b7;
    color: #333;
}

h1 {
    font-size: 48px;
    text-align: center;
    color: #0078d4;
    margin-bottom: 10px;
}

.degree-header {
            font-size: 18px;
            font-weight: bold;
            color: #084a74;
            margin-top: 20px;
        }

h2 {
    margin-top: 30px;
    color: #084a74;
    font-size: 28px;
    border-left: 5px solid #0078d4;
    padding-left: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 12px 16px;
    text-align: left;
    border: .5px solid black;
}

th {
    background-color: #f0f3f6;
    color: #0056b3;
    font-weight: bold;
    text-transform: uppercase;
}

td {
    color: #555;
}

tr:nth-child(even) {
    background-color: #f9fbfd;
}

tr:hover {
    background-color: #eef6ff;
    transition: background-color 0.3s ease;
}

.container {
    max-width: 1200px;
    margin: 20px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #0078d4;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, transform 0.2s;
}

.btn:hover {
    background-color: #005bb5;
    transform: translateY(-2px);
}

.print-btn {
    margin-top: 35px;
    text-align: right;
}

.print-btn .btn {
    background-color: #28a745;
}

.print-btn .btn:hover {
    background-color: #218838;
}

@media (max-width: 768px) {
    body {
        margin: 10px;
    }

    h1 {
        font-size: 36px;
    }

    table {
        font-size: 14px;
    }

    .btn {
        font-size: 14px;
        padding: 10px 20px;
    }
}

    </style>

</head>
<body>
    <div class="container">
        <h1>Registered Users</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['date']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No registered users found.</p>
        <?php endif; ?>
        <a href="admin_dashboard.php" class="btn">Back to Dashboard</a>
    
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
