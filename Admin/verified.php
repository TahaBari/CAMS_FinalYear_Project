<?php
include 'db_connect.php';

// Fetch approved students
$query = "SELECT * FROM stud_admission WHERE status = 'approved' ORDER BY degree, full_name";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .center {
            text-align: center;
            margin-top: 20px;
        }

        .degree-header {
            font-size: 18px;
            color: #084a74;
            margin-top: 20px;
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

    </style>
</head>
<body>

<div class="container">
    <h1>Verified Students</h1>
    <a href="admin_dashboard.php" class="btn">Go Back</a>

    <?php 
    if (mysqli_num_rows($result) > 0): 
        $current_degree = null;
        $counter = 1;

        echo "<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Registration No</th>
                        <th>Full Name</th>
                        <th>Degree</th>
                        <th>Program</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = mysqli_fetch_assoc($result)): 
            // Check if the degree changes and display a degree header
            if ($current_degree !== $row['degree']): 
                $current_degree = $row['degree'];
                echo "<tr>
                        <td colspan='6' class='degree-header'>" . htmlspecialchars($current_degree) . " Students</td>
                      </tr>";
            endif;

            // Display the student's information
            echo "<tr>
                    <td>" . $counter . "</td>
                    <td>" . htmlspecialchars($row['registration_no']) . "</td>
                    <td>" . htmlspecialchars($row['full_name']) . "</td>
                    <td>" . htmlspecialchars($row['degree']) . "</td>
                    <td>" . htmlspecialchars($row['program']) . "</td>
                    <td>" . htmlspecialchars($row['status']) . "</td>
                </tr>";
            $counter++;
        endwhile;

        echo "</tbody></table>"; // Close the table
    else: 
        echo "<p>No students found for the Merit List.</p>";
    endif; 
    ?>

    <!-- Generate Merit List Button -->
<div class="center">
    <button type="button"  class="btn" onclick="generateMeritList()">Generate Merit List</button>
</div>

<script>
    function generateMeritList() {
        // Perform AJAX request to release the merit list
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "merit_script.php", true); // Call the merit list action
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Success alert after the merit list is released
                alert("Merit list is successfully Released!");
            }
        };

        // Send the request
        xhr.send();
    }
</script>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
