<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background-color: #2E2516;
            color: #ffffff;
            height: 100vh;
            position: fixed;
            width: 250px;
            display: flex;
            flex-direction: column;
            padding-top: 15px;
        }

        .admin-section {
            background-color: #62481C;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .sidebar-links a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .sidebar-links a i.fa-utensils {
            display: none; /* Menghilangkan ikon garpu */
        }

        .sidebar-links a:hover {
            background-color: #62481C;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="admin-section">
            <a>MOAS</a>
        </div>
        <div class="sidebar-links">
            <a href="#">
                <i class="fas fa-user"></i> Kelola Profile
            </a>
            <a href="<?php echo site_url('katering') ?>">
                Kelola Katering
            </a>
            <a href="#">
                <i class="fas fa-book"></i> Kelola Berlangganan
            </a>
            <a href="<?php echo site_url('admin/logout');?>">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
