<?php 

    $Article = isset($_GET['title']) ? $_GET['title'] : '';

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Devcrud">
    <title>Glow in Wellness</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Allura&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Grey+Qo&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	  <link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .receipt-container {
            width: 450px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            color: #000000;
        }
        .receipt-container h2 {
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: normal;
        }
        .receipt-container p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .service-description {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .service-description .service-name {
            font-weight: bold;
            font-size: 14px;
            margin-right: 10px;
            text-align: left;
            flex-grow: 1;
        }
        .service-description .service-price {
            font-size: 14px;
            white-space: nowrap;
        }
        .services {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .total-price {
            background-color: #dff0d8;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            color: #3c763d;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            white-space: nowrap;
        }
        hr {
            border: 0;
            border-top: 2px solid #e771f9;
            margin: 10px 0;
        }

        /* Style for the Back to home button in mobile view */
.custom-mobile-btn {
    display: inline-block;
    padding: 8px 16px;
    background-color: white;
    color: black;
    border: 2px solid #e771f9;
    font-weight: bold;
    border-radius: 4px;
    text-align: center;
}

/* Hide the button for larger screens (desktop view) */
@media (min-width: 768px) {
    .custom-mobile-btn {
        display: none;
    }
}

/* Style for desktop view */
.nav-link {
    color: black;
    font-weight: bold;
}


        
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/imgs/logo.svg" alt="Logo">
        </a>

        <!-- Back to home button for mobile -->
        <a href="index.php" class="btn custom-mobile-btn d-md-none">Back to home</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-none d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Back to home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- End Of Second Navigation -->


    <!-- Login Section -->
    <section id="login" class="section has-img-bg pb-0" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div class="container">
        <div class="content transition text-center">
            <div class="container-fluid dashboard">
                <br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-12 col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <div class="well">
                                            <br>
                                            <form method="post" enctype="multipart/form-data" style="text-align: left;">
                                                <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
                                                    <!-- Image and Upload Button -->
                                                    <?php
                                                    // Include database connection
                                                    include('db_connect.php');

                                                    // SQL query to fetch blog posts
                                                    $sql = "SELECT * FROM tbl_blog WHERE title = '$Article'";
                                                    $result = mysqli_query($db_connection, $sql);
                                                    ?>
                                                    
                                                    <!-- Blog Title and Author -->
                                                    <div style="flex: 1; text-align: center;">
                                                        <?php
                                                        // Display each blog post's title, author, and date
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<img id='avatar' src='Photos/Blogs/" . $row['blog_img'] ."' 
                                                                        style='width: 100%; max-width: 400px; height: auto; object-fit: cover;'>
                                                                      <br><br>";
                                                                echo "<div style='text-align: center;'>";
                                                                echo "<h2 style=\"font-family: 'Satisfy', cursive; color: #7E007D;\">" . $row['title'] . "</h2>";

                                                                echo "<p style=\"color: #000000;\">" . $row['post_date'] . " | Authored by: " . $row['author'] . "</p><br>";
                                                                echo "</div>";
                                                            }
                                                        } 
                                                        ?>
                                                    </div>
                                                </div>

                                                <!-- Blog Content -->
                                                <div style="margin-top: 20px;">
                                                    <?php
                                                    // Loop again for blog content
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // Move the result pointer back to the beginning
                                                        mysqli_data_seek($result, 0);

                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $content = htmlspecialchars_decode($row['content']);
                                                            $content = str_replace('<p>', '<p style="color: #000000; font-size: 16px; line-height: 1.5; margin-bottom: 15px;">', $content);

                                                            echo "<div style='margin-bottom: 20px;'>";
                                                            echo $content;
                                                            echo "</div>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright paragraph placed here outside the row but inside the container -->
            <br><br>
            <div style="flex-grow: 1; height: 1px; background-color: #ccc;"></div>
            <p class="mb-0 small text-center" style="padding-top: 20px;">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved</p>
            <br><br>
        </div>
    </div>
</section>


	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>


</body>
</html>
