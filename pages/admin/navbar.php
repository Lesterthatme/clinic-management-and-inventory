<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #97ce89;
            height: 10vh;
        }

        .container-nav{
            background-color: antiquewhite;
            width: 100vw;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: bold;
            color: #315b30;
            font-size: clamp(1rem, 3vw, 2.5rem);
        }

        .navbar-brand:hover {
            color: #1a3a2a;
        }

        .navbar-nav .nav-link {
            color: #315b30;
            font-weight: 500;
            font-size: 1.3rem;
        }

        .navbar-nav .nav-link:hover {
            color: #1a3a2a;
        }

        .nav-context img{
            padding-right: 0.5rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid nav-context">
            <img src="../../assets/img/basc.png" alt="basc logo" height="70px">
            <a class="navbar-brand" href="#">BASC Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventory.php">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-record.php">Add Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="records.php">Patients Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>