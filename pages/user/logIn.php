<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b58a0fb602.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/style/headerstyle.css">
    <link rel="stylesheet" href="../../assets/style/loginStyle.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/basc.png" alt="Logo" style="height: 65px; margin-right: 10px;">
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
                    <li class="nav-item">
                        <a class="nav-link" href="./logIn.php">Log-in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="content">
            <div class="login-container">
                <!-- Left Information Section -->
                <div class="info-section">
                    <h1>BASC CLINIC</h1>
                    <p>Inventory and Management system</p>
                    <p>A powerful, yet easy-to-use application for managing clinic.</p>
                </div>

                <!-- Right Login Section -->
                <div class="form-section">
                    <h2>Log into Clinicare</h2>
                    <p>Enter your login details below.</p>
                    <?php if (isset($_SESSION['error'])): ?>
                    <div style="color: red; font-weight: bold;">
                        <?php echo $_SESSION['error']; ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <form action="./../../functions/userFuctions.php" method="POST">
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email Address || Account Number</label>
                            <input type="email" id="userEmail" name="userEmail" class="form-control"
                                placeholder="Enter your email or Account Number" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" id="userPassword" name="userPassword" class="form-control"
                                placeholder="Enter your password" required>
                            <!-- Eye Icon -->
                            <i id="togglePassword" class="fa-solid fa-eye position-absolute"
                                style="top: 40px; right: 10px; cursor: pointer;">
                            </i>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="text-decoration-none">Forgot your password?</a>
                        </div>
                        <button type="submit" name="login_user" class="btn btn-success w-100">Sign In</button>
                        <p class="mt-3 text-center">Don't have an account? <a href="./register.php"
                                class="text-decoration-none">Create Account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // JavaScript to toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("userPassword");

    togglePassword.addEventListener("click", function() {
        // Toggle the type attribute
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        // Toggle the icon
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>