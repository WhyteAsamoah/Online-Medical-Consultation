<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css" />
    <link rel="stylesheet" type="text/css" href="/css/register.css" />
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://www.w3schools.com/lib/w3.js"></script>


</head>

<body>
    <div id="wrapper">

        <div id="banner">
            <h1 style="text-align: center;color:white;margin-top:15px">Online Medical Consultation & Subscription</h1>
        </div>

        <nav id="navigation">

            <ul id="nav">
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li>
                    <a href="#">Doctor</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="register.php">Register</a>
                </li>
                <li>
                    <a href="signIn.php">Sign In</a>
                </li>
            </ul>

        </nav>

        <div id="home" class="w3-content">

            <!-- Slides -->
            <img class="slides" src="images/Admin1.jpg" width="100%">
            <img class="slides" src="images/Doc1.jpg" width="100%">
            <img class="slides" src="images/Doc2.jpg" width="100%">
            <script>
                w3.slideshow(".slides", 2000);
            </script>

            <!-- End Content -->
        </div>

        <div id="content_area">
            <img src="images/patlog.jpg" class="imgLeft" />
            <p style="font-size: 16px; line-height:2">Online medical consultation and subscription is an online patient-care that connects patients with doctors online for consultation. Our clinical areas include regular checkups, nutritional counseling, health problems that require special-care.
                A patient first stop for medical attention should be primary care. Online medical consultation do not provide services for emergenrgency care and urgent care. The diagnosis and treatment of life-threatening diseases and accidents that necessitate
                medical attention are included in emergency services.
            </p>
            <img src="images/doclog.jpg" class="imgRight" />
            <p style="font-size: 16px; line-height:2">
                The online medical consultation and subscription system allows patients to consult doctors, physician assistants, and nurse practitioners about their daily health. Our clinical areas include regular checkups, nutritional counseling, health problems
                that require special-care. A patient first stop for medical attention should be primary care. Online medical consultation do not provide services for emergenrgency care and urgent care. The diagnosis and treatment of life-threatening diseases and accidents
                that necessitate medical attention are included in emergency services.
            </p>
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

</html>