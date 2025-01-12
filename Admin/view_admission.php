<?php
session_start();
$admin_id = $_SESSION['admin_id'];

// Check if the admin is logged in, otherwise redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin-login.php");
    exit();
}

// Include the database connection file
include 'db_connect.php';

// Get the student ID from the URL
$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;

// Fetch the student record from the stud_admission table
$student_query = "
    SELECT *
    FROM stud_admission
    WHERE student_id = ?
";

$student_stmt = $conn->prepare($student_query);
$student_stmt->bind_param('i', $student_id);
$student_stmt->execute();
$student_result = $student_stmt->get_result();
$row = $student_result->fetch_assoc();

// Check if student record was found
if (!$row) {
    echo "No student found with the provided ID.";
    exit();
}

// Fetch education details
$education_query = "
    SELECT *
    FROM education
    WHERE student_id = ?
";

$education_stmt = $conn->prepare($education_query);
$education_stmt->bind_param('i', $student_id);
$education_stmt->execute();
$education_result = $education_stmt->get_result();

// Fetch mark sheets
$marksheets_query = "
    SELECT *
    FROM student_marksheets
    WHERE student_id = ?
";

$marksheets_stmt = $conn->prepare($marksheets_query);
$marksheets_stmt->bind_param('i', $student_id);
$marksheets_stmt->execute();
$marksheets_result = $marksheets_stmt->get_result();

// Process mark sheets into an associative array by education_id
$marksheets_by_edu = [];
while ($marksheet = $marksheets_result->fetch_assoc()) {
    $marksheets_by_edu[$marksheet['education_id']][] = $marksheet['marksheet_img'];
}

$student_stmt->close();
$education_stmt->close();
$marksheets_stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Your Application Form</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            background-color: #f1f1f1;
            padding: 10px;
            margin: 0;
            border-bottom: 2px solid #ddd;
        }

        .section table {
            width: 100%;
            border-collapse: collapse;
        }

        .section table th,
        .section table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .section table th {
            background-color: #f1f1f1;
        }

        .button-container {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-back {
            background-color: #6c757d;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style> -->

    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #0089b7;
    margin: 0;
    padding: 0;
    color: #333;
}

.container {
    width: 70%;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #e4e4e4;
}

h1 {
    text-align: center;
    font-size: 28px;
    color: #084a74;
    margin-bottom: 30px;
}

.section {
    margin-bottom: 30px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
}

.section h3 {
    background-color: #084a74;
    color: #ffffff;
    padding: 15px;
    margin: 0;
    font-size: 20px;
}

.section table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffff;
}

.section table th,
.section table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 14px;
}

.section table th {
    background-color: #f5f5f5;
    color: #555;
    font-weight: bold;
}

.section table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.btn {
    padding: 12px 25px;
    margin: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    text-decoration: none;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-edit {
    background-color: #007bff;
}

.btn-back {
    background-color: #6c757d;
}

.btn:hover {
    transform: translateY(-2px);
    opacity: 0.95;
}

.btn:focus {
    outline: none;
    box-shadow: 0 0 6px rgba(0, 123, 255, 0.5);
}

.btn-edit:hover {
    background-color: #0056b3;
}

.btn-back:hover {
    background-color: #5a6268;
}

.btn-green {
    background-color: #28a745;
}

.btn-green:hover {
    background-color: #218838;
}

@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 15px;
    }

    h1 {
        font-size: 24px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
    }
}

    </style>
</head>

<body>

    <div class="container">
        <h1>View Your Application</h1>

        <!-- Personal Information Section -->
        <div class="section">
            <h3>Personal Information</h3>
            <table>
                <tr>
                    <th>CNIC</th>
                    <td><?php echo htmlspecialchars($row['cnic']); ?></td>
                </tr>
                <tr>
                    <th>Registration No</th>
                    <td><?php echo htmlspecialchars($row['registration_no']); ?></td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo htmlspecialchars($row['dob']); ?></td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td><?php echo htmlspecialchars($row['nationality']); ?></td>
                </tr>
                <tr>
                    <th>Profile Pic</th>
                    <td><a href="<?php echo htmlspecialchars($row['photograph']); ?>" target="_blank">View</a></td>
                </tr>
            </table>
        </div>

        <!-- Contact Information Section -->
        <div class="section">
            <h3>Contact Information</h3>
            <table>
                <tr>
                    <th>Country</th>
                    <td><?php echo htmlspecialchars($row['country']); ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?php echo htmlspecialchars($row['city']); ?></td>
                </tr>
                <tr>
                    <th>Postal Address</th>
                    <td><?php echo htmlspecialchars($row['postal_address']); ?></td>
                </tr>
                <tr>
                    <th>Residential Address</th>
                    <td><?php echo htmlspecialchars($row['residential_address']); ?></td>
                </tr>
            </table>
        </div>

        <!-- Education Section -->
        <div class="section">
            <h3>Education</h3>
            <table>
                <tr>
                    <th>Degree</th>
                    <td><?php echo htmlspecialchars($row['degree']); ?></td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td><?php echo htmlspecialchars($row['program']); ?></td>
                </tr>
            </table>
        </div>

        <!-- Education Section -->
        <div class="section">
            <h3>Education</h3>
            <?php if ($education_result->num_rows > 0): ?>
                <?php while ($edu_row = $education_result->fetch_assoc()): ?>
                    <table>
                        <tr>
                            <th>Degree</th>
                            <td><?php echo htmlspecialchars($edu_row['qualification']); ?></td>
                        </tr>
                        <tr>
                            <th>Institute Name</th>
                            <td><?php echo htmlspecialchars($edu_row['institute_name']); ?></td>
                        </tr>
                        <tr>
                            <th>Passing Year</th>
                            <td><?php echo htmlspecialchars($edu_row['passing_year']); ?></td>
                        </tr>
                        <tr>
                            <th>Grade</th>
                            <td><?php echo htmlspecialchars($edu_row['grade']); ?></td>
                        </tr>
                        <tr>
                            <th>Obtained Marks</th>
                            <td><?php echo htmlspecialchars($edu_row['obtained_marks']); ?></td>
                        </tr>
                        <tr>
                            <th>Total Marks</th>
                            <td><?php echo htmlspecialchars($edu_row['total_marks']); ?></td>
                        </tr>
                        <tr>
                            <th>Mark Sheet</th>
                            <td>
                                <?php if (isset($marksheets_by_edu[$edu_row['education_id']])): ?>
                                    <?php foreach ($marksheets_by_edu[$edu_row['education_id']] as $marksheet): ?>
                                        <a href="<?php echo htmlspecialchars($marksheet); ?>" target="_blank">View Mark Sheet</a><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    No mark sheet available
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <br>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No education records found.</p>
            <?php endif; ?>
        </div>

        <!-- Status Section -->
        <div class="section">
            <table>
                <tr>
                    <th>Status</th>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
            </table>
        </div>

        <!-- Back Button -->
        <div class="button-container">
            <a href="javascript:history.back()" class="btn btn-back">Back</a>
        </div>
    </div>

</body>

</html> 
