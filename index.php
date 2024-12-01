<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .navbar {
            background: linear-gradient(to right, #d4f1d4, #e8f5e8);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d6a2d;
        }

        .navbar-nav .nav-link {
            color: #2d6a2d;
        }

        .hero-section {
            text-align: center;
            padding: 50px 20px;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2d6a2d;
            margin-bottom: 20px;
        }

        .hero-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 30px;
        }

        .hero-image {
            max-width: 100%;
            height: auto;
        }

        .pagination-circle {
            width: 10px;
            height: 10px;
            background-color: #a3d3a3;
            border-radius: 50%;
            margin: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/30" alt="Logo" style="width: 30px; height: 30px; margin-right: 10px;">
                BASC Clinic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-md-6">
                    <h1 class="hero-title">HEALTH CARE</h1>
                    <p class="hero-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus iaculis justo vel felis suscipit, nec fermentum ipsum scelerisque. In hac habitasse platea dictumst.
                    </p>
                </div>
                <!-- Image -->
                <div class="col-md-6 text-center">
                    <img src="https://via.placeholder.com/400x300" alt="Health Care" class="hero-image">
                </div>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <span class="pagination-circle"></span>
                <span class="pagination-circle"></span>
                <span class="pagination-circle"></span>
            </div>
        </div>
    </section>

    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>

</html>