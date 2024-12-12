<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Health Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f1f8e9;
            font-family: Arial, sans-serif;
        }

        .add .container {
            margin: 15px auto;
            padding: 20px;
            width: 350px;
            background-color: #ffffff;
            border: 2px solid #c8e6c9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
            color: #2e7d32;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #c8e6c9;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #2e7d32;
        }

        .btn-primary {
            width: 100%;
            background-color: #2e7d32;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #1b5e20;
        }

        .form-header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php include 'navbar.php' ?>;
    <div class="add">
        <div class="container">
            <div class="form-header">Student Health Form</div>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="studentId">Patient Email</label>
                    <input type="text" class="form-control" id="studentId" name="studentId" required>
                </div>
                <div class="form-group">
                    <label for="illnessType">Illness Type</label>
                    <select name="" id="" class="form-select">
                        <option value="">nakadepende sa db </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="illness">Illness</label>
                    <input type="text" class="form-control" id="illness" name="illness" required>
                </div>
                <div class="form-group">
                    <label for="treatment">Findings</label>
                    <input type="text" class="form-control" id="treatment" name="treatment" required>
                </div>
                <div class="form-group">
                    <label for="illnessDate">Illness Date</label>
                    <input type="date" class="form-control" id="illnessDate" name="illnessDate">
                </div>
                <div class="form-group">
                    <label for="illnessDate" class="">Medicine</label>
                    <select name="" id="" class="form-select">
                        <option value="">kung ano ma ququiry sa gamot</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        // Automatically set today's date in the Illness Date field
        document.addEventListener("DOMContentLoaded", () => {
            const today = new Date().toISOString().split("T")[0]; // Format: YYYY-MM-DD
            document.getElementById("illnessDate").value = today;
        });
    </script>
</body>

</html>