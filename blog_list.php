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

        
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/imgs/logo.svg" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="contact">
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
                <div class="container">
    <div class="row">
        <?php
            include("db_connect.php");

            // Convert the VARCHAR date to DATE format (Y-m-d) and order by it
            $query = "SELECT * FROM tbl_blog ORDER BY STR_TO_DATE(post_date, '%d %M %Y') DESC";
            $result = $db_connection->query($query);

            while ($row = $result->fetch_assoc()) {
                // Decode HTML entities, strip HTML tags, and limit the content to the first 25 words
                $clean_content = strip_tags(html_entity_decode($row['content']));
                $words = explode(" ", $clean_content);
                $short_content = implode(" ", array_slice($words, 0, 25)) . '...';

                echo "
                <div class='col-md-4 mb-4'>
                    <div class='card h-100 shadow-sm' style='border-radius: 15px;'>
                        <img src='Photos/Blogs/" . $row['blog_img'] . "' alt='Blog Image' class='card-img-top' style='border-radius: 15px 15px 0 0; height: 200px; object-fit: cover;'>
                        <div class='card-body d-flex flex-column'>
                            <h2 style='font-family: Satisfy, cursive; color: #7E007D; font-size: 22px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>
                                " . $row['title'] . "
                            </h2>
                            <p class='text-muted' style='font-family: Arial, sans-serif; color: #666; font-size: 14px;'>
                                " . $short_content . "
                            </p>
                            <a href='blog_article.php?title=" . $row['title'] . "' class='mt-auto' style='font-family: Arial, sans-serif; text-decoration: none; color: #7E007D; font-weight: bold; text-align: center; display: block;'>
                                Go To The Article
                            </a>
                        </div>
                    </div>
                </div>";
            }
        ?>
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
