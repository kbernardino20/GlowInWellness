<?php

    // Check if the 'alert' key exists in the URL
    if (isset($_GET['alert'])) {
        // Retrieve the alert message from the URL
        $alertMessage = urldecode($_GET['alert']);

        // Display the alert message
        echo "<script>alert('$alertMessage');</script>";
    }

    //set database connection
    include("db_connect.php");
    include("contactus_process.php");

    // Check if the form is submitted
    
    if (isset($_POST['contact-submit'])) {

      // Get the values from the form
      $datenow = date('Y-m-d H:i:s');
      $cont_name = $_POST['indexname'];
      $cont_email = $_POST['indexemail'];
      $cont_message = $_POST['indexmessage'];

      // SQL query to insert values into tbl_index_messages
      $sql = "INSERT INTO tbl_index_messages (date, name, email, messages)
      VALUES ('$datenow', '$cont_name', '$cont_email', '$cont_message')";

      // Execute the query
      mysqli_query($db_connection, $sql);

      $alertMessage = "Your message has been sent to admin!";
      $encodedMessage = urlencode($alertMessage);

      // Redirect to log in page with the alert message
      header("Location: index.php?alert=$encodedMessage");
    }

    $query = "SELECT * FROM tbl_products";
    $result = mysqli_query($db_connection, $query);

    session_start();
    $user_email = session_id(); // Default URL if no session
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
            $user_email = session_id();
            $query2 = "SELECT SUM(quantity) as total_quantity FROM tbl_guestorders WHERE email = '$user_email'";
            $result2 = $db_connection->query($query2);

            if ($result2) {
                $row = $result2->fetch_assoc();
                $count2 = $row['total_quantity'];
            }
        } else {
            $user_email = $_SESSION['email'];
            $query2 = "SELECT SUM(quantity) as total_quantity FROM tbl_Orders WHERE email = '$user_email'";
            $result2 = $db_connection->query($query2);

            if ($result2) {
                $row = $result2->fetch_assoc();
                $count2 = $row['total_quantity'];
            }
        }
    } else {
        $query2 = "SELECT SUM(quantity) as total_quantity FROM tbl_guestorders WHERE email = '$user_email'";
        $result2 = $db_connection->query($query2);

        if ($result2) {
            $row = $result2->fetch_assoc();
            $count2 = $row['total_quantity'];
        }
    }

    
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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    
    Bootstrap + LeadMark main styles -->
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/leadmark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        
    

    <style>
        .headtitle {
            font-family: 'Allura', cursive;
            font-size: 150px;
        }

        .signGloria {
            font-family: 'Sacramento', cursive;
            color: #7E007D;
        }

        .sectitle {
            font-family: 'Sacramento', cursive;
            /* font-family: 'Sacramento', cursive; */
            color: #7E007D;

        }

        .padding-cell {
            padding: 8px; 
            font-size: 0.85rem; 
        }

        .footericon {
            padding: 5px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .footericon:hover {
            opacity: 0.7;
        }

        @font-face {
            font-family: 'MyCustomFont';
            src: url('assets/css/amsterdamthreeslant-axaym.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .nav-item .badge.notif {
            top: -10px; /* Adjust vertical position */
            right: -10px; /* Adjust horizontal position */
            font-size: 0.8rem; /* Adjust the size of the badge */
            padding: 0.4em 0.6em; /* Adjust the padding */
            border-radius: 50%; /* Make it circular */
        }

        /* Floating Contact Button */
        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #7E007F; /* Purple background by default */
            color: white;
            border: none;
            border-radius: 50%; /* Circular shape */
            padding: 15px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        /* Style when form is active (change button to dark with X icon) */
        .floating-button.active {
            background-color: #444; /* Dark background when active */
        }

        .floating-button i {
            font-size: 24px; /* Size of the icon */
        }

                /* Floating Contact Form */
        .floating-contact {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 400px;
            height: 600px;
            background-color: white;
            border: 2px solid #7E007F;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            display: none;  /* Hidden by default */
            z-index: 1000;
        }


        /* Styles inside the form */
        .contact-header h4 {
            color: #7E007F;
            font-family: 'Cursive', sans-serif;
            font-size: 18px;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            width: 100%;
            background-color: #7E007F;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Close button style */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        /* Show the form when open */
        .floating-contact.active {
            display: block;
        }

        /* Style for the textarea */
        #contactMessage {
            width: 100%; /* Full width */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            min-height: 200px; /* Adjust the height here */
            resize: vertical; /* Allow vertical resizing */
            font-size: 16px; /* Font size inside the textarea */
            box-sizing: border-box; /* Include padding and borders in the width */
        }

        /* Style for the textarea */
        #contactMessageBot {
            width: 100%; /* Full width */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            min-height: 100px; /* Adjust the height here */
            resize: vertical; /* Allow vertical resizing */
            font-size: 16px; /* Font size inside the textarea */
            box-sizing: border-box; /* Include padding and borders in the width */
        }

        /* h1.glow-in-wellness {
        font-size: 90px;
        font-family: 'MyCustomFont', sans-serif;
        color: white;
        text-shadow: -2px -2px 0 #605F82, 2px -2px 0 #605F82, -2px 2px 0 #605F82, 2px 2px 0 #605F82;
    } */
    h1.glow-text {
            font-family: 'Sacramento', cursive;
            font-size: 120px;
            color: white;
            text-shadow: -2px -2px 0 #605F82, 2px -2px 0 #605F82, -2px 2px 0 #605F82, 2px 2px 0 #605F82;
        }

    @media (max-width: 768px) {
        h1.glow-text {
            font-size: 60px; /* Adjust size for tablet/mobile devices */
        }
    }

    @media (max-width: 480px) {
        h1.glow-text {
            font-size: 60px; /* Adjust size for smaller mobile devices */
        }
    }


    @media (max-width: 768px) {
        .section-title {
            font-size: 30px; /* Adjust title size for mobile */
        }

        .about-content {
            flex-direction: column; /* Stack text and image on mobile */
        }

        .about-text {
            margin-bottom: 20px;
        }

        .about-image {
            margin-left: 0;
            max-width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 24px; /* Further reduce font size for smaller screens */
        }

        .about-text p {
            font-size: 16px; /* Smaller font size for better readability */
        }

        .signGloria {
            font-size: 24px; /* Adjust signature font size */
        }
    }


    .navbar-toggler {
    margin-left: 10px;
}

.navbar-brand img {
    max-height: 40px;
}

.navbar-nav .nav-link {
    font-size: 16px;
}

.badge {
    top: 5px;
    right: 10px;
}


    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<!-- Floating Contact Form -->
<div class="floating-contact" id="contactForm">
        <div class="contact-header">
            <h4>Glow in Wellness <br>Massage and Bowen Therapy</h4>
            <p>Hi! Let us know how we can help and we'll respond shortly.</p>
        </div>
        <form method="post">
                        <?php 
                        if (isset($_SESSION['role'])){
                            $disabled = 'disabled';
                            // Store session values in hidden fields to be passed with form submission
                            echo '<input type="hidden" name="name" value="'.$_SESSION['first_name']. " " .$_SESSION['last_name'] .'">';
                            echo '<input type="hidden" name="email" value="'.$_SESSION['email'].'">';
                        } else {
                            $disabled = 'required';
                        }
                    ?>

            <input type="text" name="namefloat" placeholder="Name*" <?php echo $disabled; ?> value="<?php echo isset($_SESSION['first_name'], $_SESSION['last_name']) ? $_SESSION['first_name']. ' ' .$_SESSION['last_name'] : ''; ?>">

            <input type="email" name="emailfloat" placeholder="Email*" <?php echo $disabled; ?> value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <input type="subject" name="subjectfloat" placeholder="Subject*" required>
            <textarea id="contactMessage" name="messagefloat" placeholder="How can we help?*" required></textarea>
            <button type="submit" name="submitfloat">Send</button>
        </form>
        <button class="close-btn" id="closeBtn"></button>
    </div>

    <!-- Floating Contact Us Button -->
    <button class="floating-button" id="openFormBtn">
    <i class="fas fa-comment-alt"></i> <!-- Font Awesome icon -->
</button>


    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand" href="#">
            <img src="assets/imgs/logo.svg" alt="Logo">
        </a>

        <!-- Login and Cart Icons beside the toggler in mobile view -->
        <div class="d-md-none d-flex align-items-center">
            <!-- User Icon -->
            <a class="nav-link position-relative" href="<?php echo isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 'admin-Dashboard.php' : (isset($_SESSION['role']) ? 'user-homepage.php' : 'login.php'); ?>" title="Login">
                <i class="fas fa-user"></i>
            </a>

            <!-- Cart Icon -->
            <a class="nav-link position-relative" href="<?php echo isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 'guest-Cart.php' : (isset($_SESSION['role']) ? 'user-MyOrders.php' : 'guest-Cart.php'); ?>" title="My Cart">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-badge" class="badge badge-danger notif position-absolute" style="display: none;">0</span>
            </a>

            <!-- Toggler Button for Mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item service">
                    <a class="nav-link" href="#service">Services</a>
                </li>
                <li class="nav-item about">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item portfolio">
                    <a class="nav-link" href="#portfolio">Products</a>
                </li>
                <li class="nav-item blog">
                    <a class="nav-link" href="#blog">Blogs</a>
                </li>
                <li class="nav-item contact">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                
                <!-- User Icon (Hidden in mobile view) -->
                <li class="nav-item d-none d-md-inline-block">
                    <a class="nav-link position-relative" href="<?php echo isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 'admin-Dashboard.php' : (isset($_SESSION['role']) ? 'user-homepage.php' : 'login.php'); ?>" title="Login">
                        <i class="fas fa-user"></i>
                    </a>
                </li>

                <!-- Cart Icon (Hidden in mobile view) -->
                <li class="nav-item d-none d-md-inline-block">
                    <a class="nav-link position-relative" href="<?php echo isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? 'guest-Cart.php' : (isset($_SESSION['role']) ? 'user-MyOrders.php' : 'guest-Cart.php'); ?>" title="My Cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="cart-badge" class="badge badge-danger notif position-absolute" style="display: none;">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>




    <!-- End Of Second Navigation -->

    <!-- Page Header -->
    <header class="header">
        <div class="overlay">
            <h1 class="subtitle">Welcome to</h1><br><br><br>
            <!-- <h1 class="glow-in-wellness">
                Glow in Wellness
            </h1> -->
            <h1 class="glow-text">
        Glow in Wellness
    </h1>

            <br><br>
            <h1 class="subtitle">MASSAGE AND BOWEN THERAPY</h1><br>
            <a href='<?php if (isset($_SESSION['role'])){
                                if ($_SESSION['role'] == "admin"){
                                    echo 'guest-Services.php'; 
                                } else { 
                                    echo 'user-homepage.php'; 
                                }
                            } else {
                                echo 'login.php'; 
                            }
                ?>' class='btn btn-primary btn-lg rounded w-lg mt-3'>Book an appointment</a>
            
        </div>  
        <div class="shape">
            <svg viewBox="0 0 1500 200">
                <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
            </svg>
        </div>  
        <div class="mouse-icon"><div class="wheel"></div></div>
    </header>
    <!-- End Of Page Header -->


    

    <!-- Service Section -->
    <section  id="service" class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 mb-md-0" style="border-radius: 10px; border: 1px solid black; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title mt-3" style="color: #7E007D;">Wholistic Assessment</h5><br>
                        <p class="mb-0" style="text-align: center;">
                            When you receive a treatment at GIW, I'll adjust my approach to suit what you need. It might be hot stones, cupping, or taping. It's all included, depending on what's best for YOUR body.
                            <br>
                        </p>
                        <div class="mt-auto"></div> <!-- Spacer to push content to the top -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 mb-md-0" style="border-radius: 10px; border: 1px solid black; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title mt-3" style="color: #7E007D;">My promise to you</h5><br>
                        <p class="mb-0" style="text-align: justify;">
                            A judgement-free zone where everyone is welcome and treated with respect.
                        </p>
                        <p>Respect for your body, your treatment, your lifestyle.</p>
                        <div class="mt-auto"></div> <!-- Spacer to push content to the top -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 mb-md-0" style="border-radius: 10px; border: 1px solid black; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title mt-3" style="color: #7E007D;">Accreditations</h5>
                        <p class="mb-0" style="text-align: center; font-weight: bold;">Diploma of Remedial Massage,</p>
                        <p class="mb-0" style="text-align: center;">Q Academy, QLD.</p>
                        <br>
                        <p class="mb-0" style="text-align: center;">
                            <span style="font-weight: bold;">IASTM</span> - Instrument-Assisted Soft Tissue Mobilisation
                        </p>
                        <p class="mb-0" style="text-align: center;">
                            <span style="font-weight: bold;">Scar Tissue Therapy</span> - CK Massage, QLD
                        </p>
                        <p class="mb-0" style="text-align: center;">
                            <span style="font-weight: bold;">ANTA Member</span> (Australian Natural Therapists Association)
                        </p>
                        <p class="mb-0" style="text-align: center;">
                            <span style="font-weight: bold;">Insurance</span> - Guild Insurance
                        </p>
                        <div class="mt-auto"></div> <!-- Spacer to push content to the top -->
                    </div>
                </div>
            </div>
        </div>
    </div>


            
            <br><br><br>
            <h1 class="section-title text-center sectitle" style="font-size: 50px;">Services and Pricing</h1>
            
            <h6 class="section-subtitle text-center mb-5 pb-3">All of my massages combine remedial and relaxation techniques, so you don't need to choose between the two. Your body will let us know what you need.

            </h6>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <!-- <small class="text-primary font-weight-bold">01</small> -->
                                <h5 class="card-title mt-3" style="color: #7E007D;"><b>Remedial Massage Therapy</b></h5>
                                <p class="mb-0" style="text-align: justify;">
                                Our Remedial Massage services offer tailored treatments for targeted relief. Choose a 30-minute session for focused attention, 60 minutes for thorough care and relaxation, or 90 minutes for a comprehensive full-body experience, ensuring total rejuvenation. <br>
                                    <br>
                                    <a href="massage-services.php" class="btn btn-primary btn-lg rounded w-md mt-3" style="font-size: 12px;">See prices</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <!-- <small class="text-primary font-weight-bold">02</small> -->
                                <h5 class="card-title mt-3" style="color: #7E007D;"><b>Bowen Therapy</b></h5>
                                <p class="mb-0" style="text-align: justify;">
                                Bowen Therapy uses gentle, precise movements to restore balance to the Autonomic Nervous System, promoting the body's natural healing. It addresses various conditions holistically, including pain, stress, and digestive issues, with treatments lasting 30-40 minutes.
                                    <br><br>
                                    <a href="bowen-therapy.php" class="btn btn-primary btn-lg rounded w-md mt-3" style="font-size: 12px;">See prices</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          

            
            <div class="text-center">
                <br>
                <?php
                    $redirectURL = 'login.php'; // Default URL if no session
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == "admin") {
                            $redirectURL = 'guest-Services.php';
                        } else {
                            $redirectURL = 'user-homepage.php';
                        }
                    }
                ?>
                <button type="submit" class="btn btn-outline-primary btn-lg rounded w-lg mt-3" onclick="location.href='<?php echo $redirectURL; ?>'">Book your session now</button>
            </div>
        </div>
    </section>
    <!-- End OF Service Section -->




    <!-- About Section -->
    <section class="section" id="about">
    <div class="container">
        <p class="section-title mb-0" style="font-size: 40px; color: #7E007D; font-family: 'Sacramento', cursive;">Meet Gloria</p>
        <br>
        <div class="about-content" style="display: flex; flex-wrap: wrap; align-items: flex-start;">
            <div class="about-text" style="flex: 1;">
                <p style="text-align: justify;">You may not have met a massage therapist quite like me!</p>
                <p style="text-align: justify;">Glow in Wellness is a place where everyone is welcome, without judgement. And your visit has a purpose - to relax you, to relieve aches and pains, and to empower you in living YOUR version of a healthy life.</p>
                <p style="text-align: justify;">I came to massage therapy from my love of people and a passion for wanting to help others. Massage is often looked at as a luxury, but to me, it is a necessity. A necessity in dealing with the aches and pains that come from being a regular person in a busy world.</p>
                <p style="text-align: justify;">When you first step into my massage room, I'll take a moment to get to know you, your lifestyle, your body and how you manage it. I listen to my clients to determine what they really need because managing your muscles, aches, scars and energy should enhance your life, not weigh it down and become a chore.</p>
                <p style="text-align: justify;">Every client is unique in their needs and the way they manage their body. You won't leave with an armful of exercises to do if that's not you, and I take a personalised approach. It's not one size fits all!</p>
                <p style="text-align: justify;">You will experience a firm massage if that's what's needed. I will know when I'm working on your body and talking to you, what your body needs. It may be hot stones, cupping or a firm massage versus a deep tissue approach, finished off with Kinetic tape if needed.</p>
                <p style="text-align: justify;">Massage is about relaxing with a purpose, and I want you to be empowered in managing your physical and mental well-being.</p>
                <p style="text-align: justify;">My business is an extension of me - authentic, balanced and honest,</p>
                <p style="font-size: 30px;" class="signGloria"><b>- Gloria</b></p>
            </div>
            <img src="assets/imgs/gloria.jpg" alt="Gloria" class="about-image" style="max-width: 300px; margin-left: 50px; margin-bottom: 20px;">
        </div>
    </div>
</section>
    <!-- End OF About Section -->




    

    <!-- Portfolio Section -->
    <section id="portfolio" class="section portfolio-section">
    <div class="container">
    <h1 class="section-title text-center sectitle" style="font-size: 50px;">Products available in clinic</h1>
    
    <div class="filters">
        <a href="#" data-filter=".new" class="active">All</a>
        <a href="#" data-filter=".advertising">Mask</a>
        <a href="#" data-filter=".branding">Cream</a>
        <a href="#" data-filter=".web">Others</a>
    </div>


    <div class="portfolio-container" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php 
             if ($row['item_category'] == "Mask") {
                $filter = "advertising";
             } elseif ($row['item_category'] == "Cream")   {
                $filter = "branding";
             } else {
                $filter = "web";
             }
            ?>

                <?php
                    $redirectURLproduct = 'guest-add_to_cart.php'; // Default URL if no session
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == "admin") {
                            $redirectURLproduct = 'guest-add_to_cart.php';
                        } else {
                            $redirectURLproduct = 'user-products.php';
                        }
                    }
                ?>
            <div class="col-md-6 col-lg-4 <?php echo htmlspecialchars($filter); ?> new">
                <div class="portfolio-item" style="width: 3in; height: 3in; object-fit: cover;">
                <img src="Photos/Products/<?php echo htmlspecialchars($row['item_img']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($row['product_name']); ?>" >

                    <div class="content-holder">
                        <a class="img-popup" href="assets/imgs/<?php echo htmlspecialchars($row['item_img']); ?>"></a>
                        <div class="text-holder">
                            <h6 class="title"><?php echo htmlspecialchars($row['product_name']); ?></h6>
                            <p>Price: <?php echo htmlspecialchars($row['price']); ?></p>
                            <?php if ($row['stock'] > 0): ?>
                                <br><a href='<?php echo $redirectURLproduct; ?>?selectedproducts=<?php echo urlencode($row['product_name']); ?>&selectedprice=<?php echo urlencode($row['price']); ?>' class='btn btn-primary btn-lg rounded w-md mt-3' style='font-size: 12px;'>Add to cart</a>
                            <?php else: ?>
                                <br><span class="btn btn-secondary btn-lg rounded w-md mt-3">Out Of Stock</span>
                            <?php endif; ?>
                        </div>
                    </div>   
                </div>             
            </div>
        <?php endwhile; ?>

    </div>   
</div>     
        
    </section>
    <!-- End of portfolio section -->

    <!-- Blog Section -->
    <section class="section text-center" id="blog">
    <div class="content transition">
    <h1 class="section-title text-center sectitle" style="font-size: 50px;">Latest Blogs</h1>
        <div class="container-fluid dashboard">
            <!-- Wrapper to center the row -->
            <div class="d-flex justify-content-center">
                <div class="row">
                
                    <?php
                    include("db_connect.php");

                    // Convert the VARCHAR date to DATE format and limit the result to 3 rows
                    $query = "SELECT * FROM tbl_blog ORDER BY STR_TO_DATE(post_date, '%d %M %Y') DESC LIMIT 3";
                    $result = $db_connection->query($query);

                    while ($row = $result->fetch_assoc()) {
                        // Decode HTML entities, strip HTML tags, and limit the content to the first 25 words
                        $clean_content = strip_tags(html_entity_decode($row['content']));
                        $words = explode(" ", $clean_content);
                        $short_content = implode(" ", array_slice($words, 0, 25)) . '...';

                        echo "<div style='text-align: center; padding: 20px; border: 1px solid #eee; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); max-width: 400px; margin: 20px;'>
                                <img src='Photos/Blogs/" . $row['blog_img'] . "' alt='Blog Image' style='width: 100%; border-radius: 10px 10px 0 0;'>
                                
                                <h2 style=\"font-size: 30px; font-family: 'Sacramento', cursive; color: #7E007D; margin-top: 15px;\">" . htmlspecialchars($row['title']) . "</h2>
                                
                                <p style='font-family: Arial, sans-serif; color: #666; padding: 0 10px;'>
                                    " . $short_content . "
                                </p>
                                
                                <a href='blog_article.php?title=" . $row['title'] . "' style='display: inline-block; margin-top: 15px; font-family: Arial, sans-serif; text-decoration: none; color: #7E007D; font-weight: bold;'>
                                    Go To The Article
                                </a>
                            </div>";
                    }
                    ?>
                
                </div>
                
            </div>
        </div>
    </div>
    <a href="blog_list.php" class="btn btn-primary btn-lg rounded w-lg mt-3">View all blogs</a>
</section>

    <!-- End of Blog Section -->

    <!-- Testmonial Section -->
    <section class="section" id="testmonial">
        <div class="container">
            <h1 class="section-title text-center sectitle" style="font-size: 50px;">Client Testimonials</h1>
            <h6 class="section-subtitle mb-5 text-center">What Our Clients Says</h6>
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            
                            <p class="mb-0">"Excellent, amazing and skilled Massage Therapist....book with Gloria."<br><br><br></p>
                            <div class="media align-items-center mb-3">
                                <div class="media-body">
                                    <h6 style="font-size: 20px;" class="signGloria"><b>- Liz S, 29/07/2022</b></h6>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            
                            <p class="mb-0">"Loved your last cupping session, excited to see what this training brings for you and the new skills you'll have."<br><br></p>

                            <div class="media align-items-center mb-3">
                                <div class="media-body">
                                    <h6 style="font-size: 20px;" class="signGloria"><b>- Britanny L, 23/04/2022</b></h6>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                
                            </div>
                            <p class="mb-0">"Thank you for sharing your gift with us for Happy Educators Day!!"<br><br><br></p>
                            <div class="media-body">
                                <h6 style="font-size: 20px;" class="signGloria"><b>- Christian Chil, 09/01/2021</b></h6>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Testmonial Section -->

    

    <!-- Contact Section -->
    <section id="contact" class="section has-img-bg pb-0">
        <div class="container align-items-center">
            
            <?php include("contactus.php");?>
         
            </div>
            <!-- Page Footer -->
            <footer class="mt-5 py-4 border-top border-secondary text-center">
                
                <p class="mb-0 small">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved </p>     
            </footer>
            <!-- End of Page Footer -->  
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var itemCount = <?php echo $count2; ?>; // Dynamic item count from PHP
    var badges = document.querySelectorAll('#cart-badge'); // Get all elements with id 'cart-badge'

    if (itemCount > 0) {
        badges.forEach(function(badge) {
            badge.textContent = itemCount;
            badge.style.display = 'inline-block';
        });
    }
});



    </script>


    <Script>
        document.addEventListener("DOMContentLoaded", function() {
    // Get the button and form elements
    const openFormBtn = document.getElementById('openFormBtn');
    const contactForm = document.getElementById('contactForm');

    // Toggle form and button content
    openFormBtn.addEventListener('click', function() {
        if (contactForm.classList.contains('active')) {
            // Close the form
            contactForm.classList.remove('active');
            openFormBtn.classList.remove('active');
            openFormBtn.innerHTML = '<i class="fas fa-comment-alt"></i>'; // Change back to speech bubble icon
        } else {
            // Open the form
            contactForm.classList.add('active');
            openFormBtn.classList.add('active');
            openFormBtn.innerHTML = '<i class="fas fa-times"></i>'; // Change to X icon
        }
    });
});

    </Script>

</body>
</html>
