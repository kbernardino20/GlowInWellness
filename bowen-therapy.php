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
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .headtitle {
            font-family: 'Allura', cursive;
            font-size: 150px;
        }

        .signGloria {
            font-family: 'Satisfy', cursive;
            /* font-family: 'Grey Qo', cursive; */
            color: #7E007D;
        }

        .sectitle {
            font-family: 'Satisfy', cursive;
            /* font-family: 'Satisfy', cursive; */
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
                    <a class="nav-link" href="index.php" style="color: black;">Back to home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- End Of Second Navigation -->


    <!-- Service Section -->
    <section  id="service" class="section pt-0">
        <div class="container">
            <br><br><br><br><br><br>
            <h1 class="section-title text-center sectitle" style="font-size: 50px;">Bowen Therapy</h1>
            
            </h6>
                <?php
                    $redirectURLservice = 'guest-SelectDate.php'; // Default URL if no session
                    session_start();
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == "admin") {
                            $redirectURLservice = 'guest-SelectDate.php';
                        } else {
                            $redirectURLservice = 'user-Booking_SelectDate.php';
                        }
                    }
                ?>

<?php
	include("db_connect.php");

	$query = "SELECT * FROM tbl_services WHERE Service_category = 'Bowen Therapy'";
	$result = $db_connection->query($query);

	while ($row = $result->fetch_assoc()) {
		echo "<div class='col-12 col-md-6 col-lg-12'>
				<div class='card mb-3'>
					<div class='card-body'>
						<div class='row'>
							<div class='col-12 col-md-4 d-flex align-items-center'>
								<img src='Photos/Services/".$row["Service_image"]."' alt='' class='img-fluid' style='width: 2.5in; height: 1.5in; max-width: 100%;'>
							</div>
							<div class='col-12 col-md-8'>
								<h6 class='mt-2'>" .$row["service"]." - A$".$row["price"]."</h6>
								<p>".$row["service_description"]."</p>
								<a href='". $redirectURLservice ."?selectedservice=".urlencode($row['service'])."' class='btn btn-primary btn-lg rounded w-100 w-md-auto mt-3' style='font-size: 12px;'>Make an appointment</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>";
	}
?>

		<br>
        <h1 class="section-title text-center sectitle" style="font-size: 50px;">All you need to know</h1>
<br>

        <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">What is Bowen Theraphy?</h1>
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Developed by the late Thomas Bowen (from Geelong, Australia) Bowen Therapy, <br>also known as Bowen technique, is the use of small, measured movements over the skin, <br>which triggers the body to heal itself.  </p>

        <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Our Nervous system and the benefits of Bowen Therapy.</h1>
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Our bodies are made of multiple systems which enable it to function. One of these systems <br>is the Autonomic Nervous System (ANS) which controls over 80% of the body’s processes.</p>		
			

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Developed by the late Thomas Bowen (from Geelong, Australia) Bowen Therapy, <br>also known as Bowen technique, is the use of small, measured movements over the skin, <br>which triggers the body to heal itself.  </p>		
			

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Developed by the late Thomas Bowen (from Geelong, Australia) Bowen Therapy, <br>also known as Bowen technique, is the use of small, measured movements over the skin, <br>which triggers the body to heal itself.  </p>	
        
            <div class="col-md-6 col-lg-12">
					<div class="card">
						<div class="card-body">
                        <h1 class="section-title text-center" style="font-size: 20px; color: #7E007D;"><i>Bowen Therapy techniques focus on the whole body rather than <br>just what’s painful or not functioning at optimal level. </i></h1>
                        <h1 class="section-title text-center" style="font-size: 20px; color: #7E007D;"><i>As everything in our body is connected, <br>By releasing one part of your body, you can bring change to another.  </i></h1>
						</div>
					</div>
				</div>


        

        <br><br>
        <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">How long are treatments?</h1>
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Treatments last between 30-40mins but allow up to an hour which includes time <br>for consultation  to see where you're health is at.</p>
			
        <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">What conditions can Bowen Therapy used to treat ?</h1>
        <ul class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000; list-style-type: none; padding-left: 0;">
            <li>Back pain and sciatica</li>
            <li>Digestive and bowel problems</li>
            <li>Earache and TMJ problems</li>
            <li>Migraines and other types of headaches</li>
            <li>Fibromyalgia and chronic fatigue syndrome</li>
            <li>Hip, knee, ankle, and foot issues</li>
            <li>Menstrual and hormonal irregularities</li>
            <li>Neck and shoulder issues</li>
            <li>Respiratory issues</li>
            <li>And many more.</li>
        </ul>

        <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Who can have Bowen Therapy? </h1>
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Bowen therapy can help anyone - young and old.</p>

    </section>
    <!-- End OF Service Section -->

    

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
