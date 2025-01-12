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

// Initialize message variable
$msg = '';

// Fetch only rejected admission forms from the database
$query = "
    SELECT student_id, 
           full_name, 
           degree, 
           program, 
           status, 
           remarks
    FROM stud_admission
    WHERE status = 'pending'
    ORDER BY program, full_name
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Store the fetched results directly into the array
$students = [];

while ($row = mysqli_fetch_assoc($result)) {
    $students[] = [
        'student_id' => $row['student_id'],
        'full_name' => $row['full_name'],
        'degree' => $row['degree'],
        'program' => $row['program'],
        'status' => $row['status'],
        'remarks' => $row['remarks']
    ];
}


// Handle Approve, Reject, or Pending actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['student_id'];
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    if (isset($_POST['approve'])) {
        $query = "UPDATE stud_admission SET status='approved', remarks='$remarks' WHERE student_id=$id";
        mysqli_query($conn, $query);
        echo "<script>alert('Student form approved successfully'); window.location.href='pending.php';</script>";
    } elseif (isset($_POST['reject'])) {
        $query = "UPDATE stud_admission SET status='rejected', remarks='$remarks' WHERE student_id=$id";
        mysqli_query($conn, $query);
        echo "<script>alert('Student form rejected successfully'); window.location.href='pending.php';</script>";
    } elseif (isset($_POST['pending'])) {
        $query = "UPDATE stud_admission SET status='pending', remarks='$remarks' WHERE student_id=$id";
        mysqli_query($conn, $query);
        echo "<script>alert('Student form status set to pending'); window.location.href='pending.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/admin-panel-style.css">
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #084a74;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
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
    margin: 20px auto;
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

textarea.textarea-remarks {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    resize: none;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
}

textarea.textarea-remarks:focus {
    border-color: #0078d4;
    outline: none;
    box-shadow: 0 0 6px rgba(0, 120, 212, 0.3);
}

.button-group {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-top: 15px;
}

.btn {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.approve-btn {
    background-color: #28a745;
}

.approve-btn:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

.reject-btn {
    background-color: #dc3545;
}

.reject-btn:hover {
    background-color: #c82333;
    transform: translateY(-2px);
}

.pending-btn {
    background-color: #ffc107;
    color: #333;
}

.pending-btn:hover {
    background-color: #e0a800;
    transform: translateY(-2px);
}

    </style>

</head>

<body>
    <div>
        <div class="container">
        <h1>All Pending Applications</h1>

        <a href="admin_dashboard.php" class="btn">Go Back</a>

            <div class="scroll">
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Degree</th>
                        <th>Program</th>
                        <th>View</th>
                        <th>Action</th>
                        <th>Remarks</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                            <td><?php echo htmlspecialchars($student['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($student['degree']); ?></td>
                            <td><?php echo htmlspecialchars($student['program']); ?></td>
                            <td>
                                <a href="view_admission.php?student_id=<?php echo urlencode($student['student_id']); ?>">View Details</a>
                            </td>
                            <td>
                            <form method="POST" action="" class="form-container">
                                <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>">

                                <?php if ($student['status'] == 'pending') { ?>
                                    <textarea name="remarks" rows="2" placeholder="Enter remarks here..." required class="textarea-remarks"></textarea>
                                    <br>
                                    <div class="button-group">
                                        <button type="submit" name="approve" class="btn approve-btn">Approve</button>
                                        <button type="submit" name="reject" class="btn reject-btn">Reject</button>
                                        <button type="submit" name="pending" class="btn pending-btn">Pending</button>
                                    </div>
                                <?php } else {
                                echo '-';
                                } ?>
                            </form>

                            </td>
                            <td><?php echo htmlspecialchars($student['remarks']); ?></td>
                            <td><?php echo htmlspecialchars($student['status']); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


    </div>
</body>

</html>
