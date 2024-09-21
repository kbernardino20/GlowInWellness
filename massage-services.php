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
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .headtitle {
            font-family: 'Allura', cursive;
            font-size: 150px;
        }

        .signGloria {
            font-family: 'Sacramento', cursive;
            /* font-family: 'Grey Qo', cursive; */
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
        <a href="index.php" class="btn custom-mobile-btn d-md-none" >Back to home</a>

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
            <h1 class="section-title text-center sectitle" style="font-size: 50px;">Massage Therapy</h1>
            
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >All of my massages combine remedial and relaxation techniques, so you don't need to choose between the two. <br>Your body will let us know what you need.</p>
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

	$query = "SELECT * FROM tbl_services WHERE Service_category = 'Remedial Massage Therapy'";
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
			</div> <br><br>";
	}
?>


	
                
            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Remedial massage is the assessment and treatment of pain, muscle tension and reduced range <br>
of movement. The therapist uses techniques that are different to relax <br>
These can be but not limited to:</p>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Trigger point (TrP)</h1><br>

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Pressure placed on areas of tension and then released when <br>the tenison has dissapated</p><br>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Proprioceptive Neuromuscular Facilitation (PNF)</h1>

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Use of passive stretching followed by a contraction of the <br>muscle group targed then finished
            with another <br> passive stretch further than the original stretch.</p><br><br>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Myofascial relase (MFR)</h1>

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Sustained and controlled pressure on areas of <br>pain and tension</p><br>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Cupping</h1>

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Suction created on areas of pain and tension using silcone, <br>plastic or glass cups which
            promotes increased <br>blood flow to the area. It can cause marks <br>on the skin for up to 2 weeks. </p> <br>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Assessment</h1>

            <p class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000;" >Assessment used can be range of movement (ROM) testing,<br> postural analaysis and palpation.  <br>

            <br>I use a combination of all of assessments and techniques <br>balancing them with my intution and
            knowlege <br>gained over the last 5years</p><br>

            <h1 class="section-title text-center" style="font-size: 25px; color: #7E007D;">Remedial massage is helpful in the treatment of</h1>
                <ul class="text-center mb-5 pb-3" style="font-size: 18px; color: #000000; list-style-type: none; padding-left: 0;">
                    <li>Migranes/ headaches</li>
                    <li>Back pain</li>
                    <li>Neck and shoulder tension and pain</li>
                    <li>Sciatic</li>
                    <li>Plantar fasciatis</li>
                   
                </ul>
               

				
			</div>
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
