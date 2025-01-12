<?php
session_start();
include 'db_connect.php';

// Get the current script name to determine the context
$current_page = basename($_SERVER['PHP_SELF']);

// Check if the user is accessing the admin dashboard
if (strpos($current_page, 'admin_dashboard') !== false) {
    // Redirect to admin_login.php if admin_id session is not set
    if (!isset($_SESSION['admin_id'])) {
        header("Location: admin_login.php");
        exit();
    }
}

// Check if the user is accessing the student dashboard
if (strpos($current_page, 'stud_dashboard') !== false) {
    // Redirect to user_login.php if student_id session is not set
    if (!isset($_SESSION['student_id'])) {
        header("Location: user_login.php");
        exit();
    }
}


// // Check if the Generate Merit List button was clicked
// if (isset($_POST['generate_merit_list'])) {
//     // Define eligibility criteria for degrees
//     $eligibility_criteria = [
//         'BS' => 60,
//         'B.Ed' => 55,
//         'MS' => 50,
//         'Diploma' => 50
//     ];

//     // SQL query to fetch approved students grouped by degree
//     $query = "
//         SELECT sa.student_id, 
//                sa.registration_no,
//                sa.full_name, 
//                sa.degree, 
//                sa.program, 
//                sa.status, 
//                e.average 
//         FROM stud_admission sa
//         INNER JOIN education e ON sa.student_id = e.student_id
//         WHERE sa.status = 'approved'
//           AND e.qualification = 'Intermediate'
//           AND (
//             (sa.degree = 'BS' AND e.average >= {$eligibility_criteria['BS']}) OR
//             (sa.degree = 'B.Ed' AND e.average >= {$eligibility_criteria['B.Ed']}) OR
//             (sa.degree = 'MS' AND e.average >= {$eligibility_criteria['MS']}) OR
//             (sa.degree = 'Diploma' AND e.average >= {$eligibility_criteria['Diploma']})
//           )
//         ORDER BY sa.degree, sa.program, sa.full_name";

//     $result = mysqli_query($conn, $query);

//     // Insert approved students into the merit_list table
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             // Check if the student already exists in the merit list
//             $check_query = "SELECT * FROM merit_list WHERE student_id = {$row['student_id']}";
//             $check_result = mysqli_query($conn, $check_query);

//             if (mysqli_num_rows($check_result) == 0) {
//                 // Insert the student into the merit list
//                 $insert_query = "
//                     INSERT INTO merit_list (student_id, registration_no, full_name, degree, program, average, status)
//                     VALUES (
//                         '{$row['student_id']}',
//                         '{$row['registration_no']}',
//                         '{$row['full_name']}',
//                         '{$row['degree']}',
//                         '{$row['program']}',
//                         '{$row['average']}',
//                         '{$row['status']}'
//                     )";
//                 mysqli_query($conn, $insert_query);
//             }
//         }
//     }
// } else {
//     echo "Click 'Generate Merit List' to create the merit list.";
// }

// Fetch all students in the merit list
$query = "
    SELECT ml.registration_no, ml.full_name, ml.degree, ml.program, ml.average, ml.status 
    FROM merit_list ml
    ORDER BY ml.degree, ml.program, ml.full_name";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Merit List</title>
    
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
    border: none;
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
    margin: auto;
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

    <script>
        function printMeritList() {
            window.print();
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Merit List</h1>
    <a href="javascript:history.back()" class="btn">Go Back</a>

    <?php 
    // Group students by degree
    $current_degree = null;

    if (mysqli_num_rows($result) > 0): 
        while ($row = mysqli_fetch_assoc($result)): 
            // Display a new section for each degree
            if ($current_degree !== $row['degree']): 
                if ($current_degree !== null) {
                    echo "</tbody></table>"; // Close the previous table
                }
                $current_degree = $row['degree'];
                echo "<h2>" . htmlspecialchars($current_degree) . " Students</h2>";
                echo "
                    <table>
                        <thead>
                            <tr>
                                <th>Registration No</th>
                                <th>Full Name</th>
                                <th>Program</th>
                                <th>Average</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>";
            endif;

            // Display the student's information
            echo "<tr>
                    <td>" . htmlspecialchars($row['registration_no']) . "</td>
                    <td>" . htmlspecialchars($row['full_name']) . "</td>
                    <td>" . htmlspecialchars($row['program']) . "</td>
                    <td>" . htmlspecialchars($row['average']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                </tr>";
        endwhile;
        echo "</tbody></table>"; // Close the last table
    else: 
        echo "<p>Merit List is Not issued Yet!.</p>";
    endif; 
    ?>

    <!-- Print Button -->
    <div class="print-btn">
        <button class="btn" onclick="printMeritList()">Print</button>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
