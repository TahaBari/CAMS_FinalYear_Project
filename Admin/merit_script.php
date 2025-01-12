<?php
include 'db_connect.php';

// if (isset($_POST['generate_merit_list.php'])) { // Check if the button is clicked

// Define eligibility criteria for degrees
$eligibility_criteria = [
    'BS' => 60,
    'B.Ed' => 55,
    'MS' => 50,
    'Diploma' => 50
];

// SQL query to fetch approved students grouped by degree
$query = "
    SELECT sa.student_id, 
           sa.registration_no,
           sa.full_name, 
           sa.degree, 
           sa.program, 
           sa.status, 
           e.average 
    FROM stud_admission sa
    INNER JOIN education e ON sa.student_id = e.student_id
    WHERE sa.status = 'approved'
      AND e.qualification = 'Intermediate'
      AND (
        (sa.degree = 'BS' AND e.average >= {$eligibility_criteria['BS']}) OR
        (sa.degree = 'B.Ed' AND e.average >= {$eligibility_criteria['B.Ed']}) OR
        (sa.degree = 'MS' AND e.average >= {$eligibility_criteria['MS']}) OR
        (sa.degree = 'Diploma' AND e.average >= {$eligibility_criteria['Diploma']})
      )
    ORDER BY sa.degree, sa.program, sa.full_name";

$result = mysqli_query($conn, $query);

// Insert approved students into the merit_list table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the student already exists in the merit list
        $check_query = "SELECT * FROM merit_list WHERE student_id = {$row['student_id']}";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            // Insert the student into the merit list
            $insert_query = "
                INSERT INTO merit_list (student_id, registration_no, full_name, degree, program, average, status)
                VALUES (
                    '{$row['student_id']}',
                    '{$row['registration_no']}',
                    '{$row['full_name']}',
                    '{$row['degree']}',
                    '{$row['program']}',
                    '{$row['average']}',
                    '{$row['status']}'
                )";
            mysqli_query($conn, $insert_query);
        }
    }
}
?>