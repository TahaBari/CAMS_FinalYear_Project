<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- <link rel="stylesheet" href="CSS/style.css"> -->
    <link rel="stylesheet" href="CSS/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .section {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
            color: white;
            text-align: center;
        }

        .about-us {
            background-color: #2c3e50;
            padding: 20px;
        }

        .section h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .section p {
            font-size: 18px;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Courses Section Styling */
.section.courses {
    padding: 40px 20px;
    background-color: var(--lighting-color);
    color: white;
    text-align: center;
}

.section.courses h2 {
    font-size: 28px;
    color: var(--secondary-color);
    margin-bottom: 20px;
    border-bottom: 3px solid white;
    display: inline-block;
    padding-bottom: 10px;
}

.section.courses h3 {
    font-size: 20px;
    color: var(--secondary-color);
    margin-top: 20px;
}

.section.courses p {
    font-size: 16px;
    line-height: 1.6;
    margin: 10px 0;
}

.section.courses div {
    max-width: 800px;
    margin: 0 auto;
    text-align: left;
}

.section.courses div h3 {
    font-weight: 600;
    margin-top: 30px;
}

.section.courses div p {
    margin-left: 15px;
}

    </style>

</head>

<body>
    <header>
        <nav class="container">
            <div class="logo">
                CAMS <span>-Admission Portal</span>
            </div>
            <ul>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <li class="dropdown">
                    <a href="#">User</a>
                    <ul class="dropdown-menu">
                        <li><a href="user-login.php">Login/Registration</a></li>
                        <li><a href="user-profile.php">User Profile</a></li>
                    </ul>
                </li>
                </a>
                <a href="Admin/admin_login.php">
                    <li>Admin</li>
                </a>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to the College Admission Portal</h1>
                <p>Apply for your desired courses and track your admission status easily.</p>
                <a href="user-login.php" class="btn">Apply Online</a>
            </div>
        </section>
    </main>

    <!-- About Us Section -->
    <div class="section about-us">
        <div>
            <h2>About Us</h2>
            <p>
                Welcome to our platform! We are dedicated to providing quality education and empowering students 
                to achieve their goals. With a team of experienced instructors and state-of-the-art resources, 
                we ensure a learning experience like no other.
            </p>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="section courses">
        <div>
            <h2>Our Courses</h2>
            <h3>BS</h3>
            <p>
                The Eligibility criteria for the degree BS is: 60% average marks in Intermediate.
            </p>

            <h3>B.Ed</h3>
            <p>
                The Eligibility criteria for the degree B.Ed is: 55% average marks in Intermediate.
            </p>

            <h3>MS</h3>
            <p>
                The Eligibility criteria for the degree MS is: 50% average marks in Intermediate.
            </p>

            <h3>Diploma</h3>
            <p>
                The Eligibility criteria for the degree Diploma is: 50% average marks in Intermediate.
            </p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h4>About Us</h4>
                    <p>Our College Admission Portal streamlines the application process, helping students apply for their desired courses and track admission status in a user-friendly and efficient manner.</p>
                </div>
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="user.php">User</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Follow Us</h4>
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 College Admission Portal. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>