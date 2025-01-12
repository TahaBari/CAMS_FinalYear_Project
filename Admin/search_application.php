<?php
include 'db_connect.php';

$search_query = ""; // Initialize search query
$results = []; // Initialize results

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch search input values
    $registration_no = $_POST['registration_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $degree = $_POST['degree'];
    $program = $_POST['program'];

    // Build dynamic query
    $search_query = "
        SELECT sa.registration_no, sa.full_name, ur.email, sa.degree, sa.program, sa.status
        FROM stud_admission sa
        INNER JOIN users_reg ur ON sa.student_id = ur.id
        WHERE 1=1";

    if (!empty($registration_no)) {
        $search_query .= " AND sa.registration_no LIKE '%" . mysqli_real_escape_string($conn, $registration_no) . "%'";
    }
    if (!empty($name)) {
        $search_query .= " AND sa.full_name LIKE '%" . mysqli_real_escape_string($conn, $name) . "%'";
    }
    if (!empty($email)) {
        $search_query .= " AND ur.email LIKE '%" . mysqli_real_escape_string($conn, $email) . "%'";
    }
    if (!empty($degree)) {
        $search_query .= " AND sa.degree = '" . mysqli_real_escape_string($conn, $degree) . "'";
    }
    if (!empty($program)) {
        $search_query .= " AND sa.program = '" . mysqli_real_escape_string($conn, $program) . "'";
    }

    // Execute query
    $result = mysqli_query($conn, $search_query);
    if ($result) {
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Applications</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .form-container {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 200px;
            grid-column: span 2;
            background-color: #084a74;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 600px;
        }
        button:hover {
            background-color: #0056b3;
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
    margin: 0;
    padding: 20px;
    background-color: #f3f4f6;
    color: #333;
}

h1 {
    text-align: center;
    color: #084a74;
    font-size: 48px;
    margin-bottom: 40px;
}

.form-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
    color: #084a74;
}

input, select {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

button {
    padding: 15px;
    border: none;
    border-radius: 5px;
    background-color: #084a74;
    color: white;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    grid-column: span 2;
    margin-top: 20px;
}

button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 40px;
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 14px;
}

th {
    background-color: #084a74;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

.btn {
    display: inline-block;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #084a74;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .form-container {
        grid-template-columns: 1fr;
    }

    button {
        grid-column: span 1;
        margin: 0 auto;
    }
}

    </style>
</head>
<body>
    <h1>Search Applications</h1>
    <a href="admin_dashboard.php" class="btn">Go Back</a>
    <form method="POST">
        <div class="form-container">
            <div class="form-group">
                <label for="registration_no">Registration No:</label>
                <input type="text" id="registration_no" name="registration_no" placeholder="Enter Registration No">
            </div>
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="degree">Degree:</label>
                <select id="degree" name="degree">
                    <option value="">Select Degree</option>
                    <option value="BS">BS</option>
                    <option value="B.Ed">B.Ed</option>
                    <option value="MS">MS</option>
                    <option value="Diploma">Diploma</option>
                </select>
            </div>
            <div class="form-group">
                <label for="program">Program:</label>
                <select id="program" name="program">
                    <option value="">Select Program</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Mass Communication">Mass Communication</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Psychology">Psychology</option>
                    <option value="Software Engineering">Software Engineering</option>
                    <option value="Economics">Economics</option>
                    <option value="Mathematics">Mathematics</option>
                </select>
            </div>
            <button type="submit">Search</button>
        </div>
    </form>

    <?php if (!empty($results)): ?>
        <table>
            <thead>
                <tr>
                    <th>Registration No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Degree</th>
                    <th>Program</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['registration_no']) ?></td>
                        <td><?= htmlspecialchars($row['full_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['degree']) ?></td>
                        <td><?= htmlspecialchars($row['program']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No results found for the given criteria.</p>
    <?php endif; ?>
</body>
</html>


<?php
mysqli_close($conn);
?>
