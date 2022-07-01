<?php
session_start();
require('config.php');

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/signIn.css" />
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Justha care</title>

</head>

<body>
    <div id="wrapper">
        <div id="banner"></div>

        <nav id="navigation">

            <ul id="nav">
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>
                    <a href="#">Doctor</a>
                    <ul>
                        <li><a href="#">Physiotherapist</a></li>
                        <li><a href="#">Surgeon</a></li>
                        <li><a href="#">Medical Doctor</a></li>
                        <li><a href="#">Dentist</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Contact</a>
                    <ul>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Wechat</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Health tips</a>
                </li>
                <li>
                    <a href="#">Get Help</a>
                </li>
            </ul>

        </nav>

        <div id="container">
        
            <section id="grid-container">
                <div class="special grid1">
                    <img src="images/Admin1.jpg" alt="ADMIN" width="230px" height="230px" />
                    <a href="admin_login.php" class="btn">Admin's Login</a>
                </div>

                <div class="special grid2">
                    <a href="DocLog.php">
                        <img src="images/Doc1.jpg" alt="DOCTOR" width="230px" height="230px" />
                    </a>
                    <a href="doctor_login.php" class="btn">Doctor's Login</a>
                </div>

                <div class="special grid3">
                    <a href="online-doctor/omc/patlogin.php">
                        <img src="images/Pat1.jpg" alt="PATIENT" width="230px" height="230px" />
                    </a>
                    <a href="patient_login.php" class="btn">Patient's Login</a>
                </div>
            </section>

        </div>

        <footer id="footer" class="center">
            <a href="index.php" class="top move_right">
                <i class="fa fa-arrow-up"></i>Top
            </a>
            <div>
                <a href="#" id="foot">Terms and Conditons</a>
                <a href="#" id="foot">Data Protection</a>
                <a href="#" id="foot">Sitemap</a>
            </div>

        </footer>


    </div>
</body>