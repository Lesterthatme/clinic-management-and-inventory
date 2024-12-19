<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASC Clinic</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="./assets/style/headerstyle.css">
    <link rel="stylesheet" href="./assets/style/indexUser.css">
    <!-- script -->

</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./assets/img/basc.png " alt="Logo" style=" height: 65px; margin-right: 10px;">
                BASC Clinic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/user/schedule.php">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/user/logIn.php">Log-in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid carousel px-0">
        <button class="carousel-button prev">&#10232;</button>
        <button class="carousel-button next">&#10233;</button>
        <!-- <div>
            <span>&#8212;</span>
            <span>&#8212;</span>
            <span>&#8212;</span>
        </div> -->
        <ul>
            <li class="slide">
                <div class="row first-pagination">
                    <div class="col-md-6 context1 ">
                        <p>HEALTH CARE</p>
                        <p>At BASC Clinic, your health and well-being are at the heart of what we do. Our goal is to
                            provide compassionate care and personalized health solutions to meet your needs. From
                            preventive services to advanced treatments, we’re here to support you every step of the way.

                        </p>
                        <p>
                            Welcome to a place where care meets excellence.
                        </p>
                    </div>
                    <div class="col-md-6 context2">
                        <div class="background-object">
                            <img src="./assets/img/obj1.svg" alt="Shape">
                            <div class="absolute-picture">
                                <img src="./assets/img/clinic.png" alt="Clinic Picture">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
                <div class="row row-cols-1 second-pagination">
                    <div class="second-content">
                        <div class="col context1">
                            <p>TEAM</p>
                            <p>Clinic Staff</p>
                        </div>
                        <div class="col context2">
                            <div class="frame1">
                                <div class="background-frame">
                                    <div class="frame-absolute-image">
                                        <img src="./assets/img/doctor.png" alt="College Doctor">
                                    </div>
                                </div>
                                <div class="frame-information">
                                    <p><strong>Dr. Lourdes Fernandez</strong></p>
                                    <p>College Physician</p>
                                </div>
                            </div>
                            <div class="frame2">
                                <div class="background-frame">
                                    <div class="frame-absolute-image">
                                        <img src="./assets/img/nurseMae.png" alt="College Nurse" height="100px">
                                    </div>
                                </div>
                                <div class="frame-information">
                                    <p><strong>Nurse Mae F. Miranda</strong></p>
                                    <p>College Nurse</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="slide">
                <div class="row third-pagination">
                    <div class="col-md-6 context1">
                        <img src="./assets/img/obj2.svg" alt="object2">
                        <div class="image-float">
                            <img src="./assets/img/nurse.png" alt="nurse Picture">
                        </div>
                    </div>
                    <div class="col-md-6 context2">
                        <div class="content3">
                            <div class="title">JOIN US NOW</div>
                            <div class="description">
                                Join us at BASC Clinic, where we prioritize your health and well-being. Our dedicated
                                team offers a range of services, from preventive care to specialized treatments,
                                ensuring that your healthcare needs are met with the utmost professionalism and
                                compassion. Whether you're seeking routine check-ups or more personalized care, BASC
                                Clinic is here to support you every step of the way. Let us be your partner in health.
                            </div>
                            <div class="cta">
                                <button class="register-btn">
                                    <a href="./pages/user/register.php">Register Now</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div>

        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        const slides = document.querySelectorAll('.slide');
        const prevButton = document.querySelector('.carousel-button.prev');
        const nextButton = document.querySelector('.carousel-button.next');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.removeAttribute('data-active');
                if (i === index) {
                    slide.setAttribute('data-active', 'true');
                }
            });
        }

        prevButton.addEventListener('click', () => {
            currentSlide = (currentSlide === 0) ? slides.length - 1 : currentSlide - 1;
            showSlide(currentSlide);
        });

        nextButton.addEventListener('click', () => {
            currentSlide = (currentSlide === slides.length - 1) ? 0 : currentSlide + 1;
            showSlide(currentSlide);
        });

        showSlide(currentSlide);
    </script>
</body>

</html>