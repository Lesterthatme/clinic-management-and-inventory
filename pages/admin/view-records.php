<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6fff8;
        }

        .record-container {
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #97ce89;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .table-container {
            background-color: #ffffff;
            margin-top: 20px;
            border: 2px solid #4caf50;
            border-radius: 10px;
        }

        .table th {
            background-color: #97ce89;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .back-button {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <div class="record-container">
            <div class="header text-center">
                <h2>Patient Record</h2>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5><strong>Name:</strong>
                        <span id="patientName"></span>
                    </h5>
                    <h5><strong>ID:</strong>
                        <span id="patientID"></span>
                    </h5>
                </div>
                <div class="col-md-6">
                    <h5><strong>Institute:</strong>
                        <span id="patientInstitute"></span>
                    </h5>
                    <h5><strong>Gender:</strong>
                        <span id="patientGender"></span>
                    </h5>
                </div>
            </div>

            <div class="table-container mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Illness</th>
                            <th>Treatment</th>
                        </tr>
                    </thead>
                    <tbody id="recordBody">
                        <tr>
                            <td>2023-12-01</td>
                            <td>Fever</td>
                            <td>Paracetamol</td>
                        </tr>
                        <tr>
                            <td>2023-11-15</td>
                            <td>Cold</td>
                            <td>Antihistamine</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center back-button">
                <a href="records.php" class="btn btn-success">Back to Patients Overview</a>
            </div>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const patientName = urlParams.get('lastName') + ", " + urlParams.get('firstName');
        const patientID = urlParams.get('id') || 'N/A';
        const patientInstitute = urlParams.get('institute') || 'N/A';
        const patientGender = urlParams.get('gender') || 'N/A';

        document.getElementById('patientName').textContent = patientName;
        document.getElementById('patientID').textContent = patientID;
        document.getElementById('patientInstitute').textContent = patientInstitute;
        document.getElementById('patientGender').textContent = patientGender;
    </script>
</body>

</html>