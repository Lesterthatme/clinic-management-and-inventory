<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../../assets/style/headerstyle.css">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rosario:ital,wght@0,300..700;1,300..700&display=swap");

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            font-family: "Poppins";
        }

        :root {
            --color1: #2f5f26;
            --color2: #315b30;
            --color3: #97ce89;
            --color4: #171186;
        }

        body {
            margin: 0;
            background-image: url("../../assets/img/schedBGC.svg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-size: cover;
            height: 90vh;
        }

        .sched-body .content-body>.row:nth-child(1) {
            text-align: center;
        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(1)>p:nth-child(1) {
            font-size: clamp(1rem, 4vw, 4rem);
            color: var(--color1);
            font-weight: 600;
            padding-top: 1rem;
        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(1)>p:nth-child(2) {
            color: var(--color2);
            font-size: 1.3em;
        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(2) {
            display: flex;
            justify-content: center;

        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(2)>.row:nth-child(1)>div {
            width: 9vw;
            display: flex;
            justify-content: center;

        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(2)>.row:nth-child(1)>div button {
            background-color: var(--color3);
            /* Light green background */
            color: var(--color1);
            /* Dark green text */
            font-size: 1.2rem;
            /* Adjust font size */
            font-weight: 600;
            /* Make text bold */
            border: 2px solid var(--color1);
            /* Dark green border */
            border-radius: 30px;
            /* Makes button edges rounded */
            padding: 10px 20px;
            /* Space inside the button */
            cursor: pointer;
            /* Pointer on hover */
            transition: all 0.3s ease;
            width: 8vw;
            /* Smooth transition for hover effect */
        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(2)>.row:nth-child(1)>div button:hover {
            background-color: var(--color1);
            /* Dark green background */
            color: white;
            /* White text */
            border-color: var(--color2);
            /* Slightly lighter border on hover */
        }

        .sched-body .content-body>.row:nth-child(1)>.col:nth-child(2)>.row:nth-child(1)>div button:focus {
            outline: none;
            /* Removes default focus outline */
            box-shadow: 0 0 10px var(--color4);
            /* Adds glow effect */
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/basc.png" alt="Logo" style=" height: 65px; margin-right: 10px;">
                BASC Clinic
            </a>
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
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

    <div class="container-fluid sched-body">
        <div class="container-fluid content-body">
            <div class="row row-cols-1">
                <div class="col">
                    <p>Register Now</p>
                    <p>This is for faster transaction process inside the BASC Clinic</p>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-md-4">
                            <button id="Btn1">STUDENTS</button>
                        </div>
                        <div class="col-md-4">
                            <button id="Btn2">FACULTY</button>
                        </div>
                        <div class="col-md-4">
                            <button id="Btn3">STAFF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-4 hidden" id="studentForm">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Student Information</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="studID" class="form-label">Student ID No.</label>
                                            <input type="text" class="form-control" id="studID">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mName" class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" id="mName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="eMail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="eMail">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bDay" class="form-label">Birthday</label>
                                            <input type="date" class="form-control" id="bDay">
                                        </div>
                                        <div class="mb-3">
                                            <label for="insti" class="form-label">Institute</label>
                                            <select id="insti" class="form-select">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="agriculture">College of Agriculture</option>
                                                <option value="management">Institute of Management</option>
                                                <option value="arts_and_science">Institute of Arts and Science</option>
                                                <option value="education">College of Education</option>
                                                <option value="engineering">Institute of Engineering</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subJect" class="form-label">Subject Enrolled</label>
                                            <select id="subJect" class="form-select">
                                                <option value="" disabled selected>Choose a Subject</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Address</legend>
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay">
                                </div>
                                <div class="mb-3">
                                    <label for="town" class="form-label">Town</label>
                                    <input type="text" class="form-control" id="town">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city">
                                </div>
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4 py-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="container p-4 hidden" id="facultyForm">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Faculty Information</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mName" class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" id="mName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lName">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="eMail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="eMail">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bDay" class="form-label">Birthday</label>
                                            <input type="date" class="form-control" id="bDay">
                                        </div>
                                        <div class="mb-3">
                                            <label for="insti" class="form-label">Institute</label>
                                            <select id="insti" class="form-select">
                                                <option value="" disabled selected>Choose One</option>
                                                <option value="agriculture">College of Agriculture</option>
                                                <option value="management">Institute of Management</option>
                                                <option value="arts_and_science">Institute of Arts and Science</option>
                                                <option value="education">College of Education</option>
                                                <option value="engineering">Institute of Engineering</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Address</legend>
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay">
                                </div>
                                <div class="mb-3">
                                    <label for="town" class="form-label">Town</label>
                                    <input type="text" class="form-control" id="town">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city">
                                </div>
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4 py-2">Submit</button>
                    </div>
                </form>
            </div>

            <div class="container p-4 hidden" id="staffForm">
                <form>
                    <div class="row">
                        <div class="col-md-8">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Staff Information</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="fName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mName" class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" id="mName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="eMail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="eMail">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bDay" class="form-label">Birthday</label>
                                            <input type="date" class="form-control" id="bDay">
                                        </div>
                                        <div class="mb-3">
                                            <label for="workPosition" class="form-label">Work Position</label>
                                            <input type="text" class="form-control" id="workPosition">
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="border p-3 rounded border-success">
                                <legend class="float-none w-auto px-2">Address</legend>
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay">
                                </div>
                                <div class="mb-3">
                                    <label for="town" class="form-label">Town</label>
                                    <input type="text" class="form-control" id="town">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city">
                                </div>
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" id="province">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>

    <script>
        const subjects = {
            agriculture: ["Crop Science", "Animal Science", "Agricultural Engineering"],
            management: ["Business Administrator", "Hotel Managemenet", "Agricultural Business"],
            arts_and_science: ["Development Communication"],
            education: ["Elementary", "English Major", "Science Major"],
            engineering: ["Information Technology", "Geodetic Engineering", "Agriculture and Biosystem Engineering"],
        };

        const instiDropdown = document.getElementById("insti");
        const subjectDropdown = document.getElementById("subJect");

        // Add an event listener to detect changes in the institute dropdown
        instiDropdown.addEventListener("change", function() {
            // Get the selected institute
            const selectedInstitute = instiDropdown.value;

            // Clear the current options in the subject dropdown
            subjectDropdown.innerHTML = '<option value="" selected disabled>Choose a Subject</option>';

            // If an institute is selected, populate the subject dropdown
            if (subjects[selectedInstitute]) {
                subjects[selectedInstitute].forEach(subject => {
                    const option = document.createElement("option");
                    option.value = subject.toLowerCase().replace(/\s+/g, "_"); // Format the value
                    option.textContent = subject; // Set the display text
                    subjectDropdown.appendChild(option);
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const studentButton = document.getElementById("Btn1"); // Students button
            const facultyButton = document.getElementById("Btn2"); // Faculty button
            const staffButton = document.getElementById("Btn3"); // Staff button

            const studentForm = document.getElementById("studentForm");
            const facultyForm = document.getElementById("facultyForm");
            const staffForm = document.getElementById("staffForm");

            // Helper function to hide all forms
            function hideAllForms() {
                studentForm.classList.add("hidden");
                facultyForm.classList.add("hidden");
                staffForm.classList.add("hidden");
            }

            // Event listeners for buttons
            studentButton.addEventListener("click", function() {
                hideAllForms();
                studentForm.classList.remove("hidden");
            });

            facultyButton.addEventListener("click", function() {
                hideAllForms();
                facultyForm.classList.remove("hidden");
            });

            staffButton.addEventListener("click", function() {
                hideAllForms();
                staffForm.classList.remove("hidden");
            });
        });
    </script>
</body>

</html>