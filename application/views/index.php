<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOAS Landing Page</title>
    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS kustom -->
    <style>
        .jumbotron {
            background-color: #ffffff;
            padding: 100px;
        }

        .jumbotron-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MOAS</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Informasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <div class="jumbotron-content">
                <div>
                    <h1>Selamat Datang di MOAS!</h1>
                    <h4>Solusi Pencatatan Data Pesanan Kateringmu</h4>
                </div>
                <img src="https://via.placeholder.com/300" alt="MOAS Logo" style="max-width: 300px; max-height: 300px;">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2023 MOAS</p>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
