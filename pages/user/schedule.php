<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/schedstyle.css">
    <link rel="stylesheet" href="../../assets/style/headerstyle.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/basc.png" alt="Logo" style=" height: 65px; margin-right: 10px;">
                BASC Clinic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./schedule.php">Schedule</a>
                    </li>

                    <?php if (isset($_SESSION['userEmail'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/functions/logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./logIn.php">Log-in</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid sched-body">
        <div class="container-fluid content-body">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <p>
                        <strong>
                            BASC Clinic is a healthcare facility dedicated to providing comprehensive care to its
                            patients
                        </strong>
                    </p>
                    <p>
                        At BASC Clinic, we are committed to offering exceptional healthcare services tailored to meet
                        the diverse needs of our patients. Our skilled team is available throughout the week to provide
                        you with professional and compassionate care in a welcoming environment. Whether you need a
                        routine check-up or specialized treatment, we are here to support your health journey.
                    </p>
                    <p>
                        Our clinic operates from Monday to Friday, 8:00 AM to 5:00 PM, ensuring convenient access to
                        quality care during your busy week. On Wednesdays, we’re pleased to announce that the doctor is
                        in, providing additional consultation services for our patients. Rest assured, your health and
                        well-being remain our top priority every step of the way.
                    </p>
                </div>
                <div class="col-md-6 order-1 order-md-2 p-0">
                    <div class="box-container">
                        <p>

                            Weekly Timetable

                        </p>
                        <div class="weekdays">
                            <span> Monday </span> <span> 8:00 AM - 5 PM </span>
                        </div>
                        <hr>
                        <div class="weekdays">
                            <span> Tuesday </span> <span> 8:00 AM - 5 PM </span>
                        </div>
                        <hr>
                        <div class="weekdays">
                            <span> Wednesday </span> <span> 8:00 AM - 5 PM </span>
                        </div>
                        <div class="doctor-label">
                            <span>Doctor is IN</span>
                        </div>
                        <hr>
                        <div class="weekdays">
                            <span> Thursday </span> <span> 8:00 AM - 5 PM </span>
                        </div>
                        <hr>
                        <div class="weekdays">
                            <span> Friday </span> <span> 8:00 AM - 5 PM </span>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>