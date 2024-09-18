<?php

include("db_connect.php");
include("input-validation.php"); 


// Retrieve selected date, day, time and service
$selectedDate = isset($_GET['selecteddate']) ? $_GET['selecteddate'] : '';
$selectedDay = isset($_GET['selectedday']) ? $_GET['selectedday'] : '';
$selectedservice = isset($_GET['selectedservice']) ? $_GET['selectedservice'] : '';
$selectedtime = isset($_GET['selectedtime']) ? $_GET['selectedtime'] : '';

include("guest-Information_process.php"); 

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
    <!-- Bootstrap + LeadMark main styles -->
	  <link rel="stylesheet" href="assets/css/leadmark.css">
    

    <style>
        .headtitle {
            font-family: 'Allura', cursive;
            font-size: 150px;
        }

        .signGloria {
            font-family: 'Grey Qo', cursive;
            color: #7E007D;
        }

        .sectitle {
            font-family: 'Satisfy', cursive;
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

        .time-picker {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 400px;
            margin: 20px auto;
        }

        .time-picker button {
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%; /* Ensures buttons fill their grid cell */
        }

        .time-picker button:hover {
            background-color: #f0f0f0;
        }

        .time-picker button:active {
            background-color: #ddd;
        }

        .time-picker button.selected {
                background-color: #edc4f3;
                border-color: #edc4f3;
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
        <label style="color: #7E007F;">
        Select Service > Select a date > Select time >
        </label>
        <label style="color: #ffffff;">
            <a href="#" style="color: #ffffff; text-decoration: none;"><b> Information > </b></a>
        </label>
            <label style="color: rgba(116, 116, 116, 0.67);" > Summary > Confirmation</label>
            <br><br><br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                    <div class="well">
                                        <form method="post">
                                            <label for="firstname" style="font-size: 15px; color: #7E007D;">First Name</label>
                                            <?php echo isset($fn_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $fn_error . "*</h10>" : "" ?>
                                            <input type="text" class="form-control" name="firstname" placeholder="Enter text here" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                                            <br>
                                            <label for="lastname" style="font-size: 15px; color: #7E007D;">Last Name</label>
                                            <?php echo isset($ln_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $ln_error . "*</h10>" : "" ?>
                                            <input type="text" class="form-control" name="lastname" placeholder="Enter text here" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                                            <br>
                                            <label for="mobile" style="font-size: 15px; color: #7E007D;">Mobile Number</label>
                                            <?php echo isset($dept_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $dept_error . "*</h10>" : "" ?>
                                            <input type="text" class="form-control" name="dept" placeholder="Enter text here" value="<?php echo isset($_POST['dept']) ? $_POST['dept'] : '' ?>" required>
                                            <br>
                                            <label for="email" style="font-size: 15px; color: #7E007D;">Email</label>
                                            <?php echo isset($email_error) ? "<br><h10 style='color:red; font-size: 10px;'>*" . $email_error . "*</h10>" : "" ?>
                                            <input type="text" class="form-control" name="email" placeholder="Enter text here" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                                            <br>
                                            <div class="d-flex justify-content-between">
                                                <a href="guest-SelectTime.php?selectedservice=<?php echo urlencode($selectedservice); ?>&selectedday=<?php echo urlencode($selectedDay); ?>&selecteddate=<?php echo urlencode($selectedDate); ?>" class="btn btn-outline-primary btn-lg rounded w-50 me-2 mt-3">Back</a>
                                                <input type="submit" class="btn btn-primary btn-lg rounded w-50 ms-2 mt-3" value="Next" name="submit">
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

    <script>
    document.querySelectorAll('.time-button').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.time-button').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        document.getElementById('next-button').addEventListener('click', function(event) {
            const selectedTime = document.querySelector('.time-button.selected');
            if (!selectedTime) {
                alert('Please select a time before proceeding.');
                event.preventDefault();
            } else {
                const selectedTimeValue = selectedTime.getAttribute('data-time');
                const selectedService = "<?php echo urlencode($selectedservice); ?>";
                const selectedDate = "<?php echo urlencode($selectedDate); ?>";
                const selectedDay = "<?php echo urlencode($selectedDay); ?>";

                this.href = `guest-Information.php?selectedservice=${selectedService}&selecteddate=${selectedDate}&selectedday=${selectedDay}&selectedtime=${encodeURIComponent(selectedTimeValue)}`;
            }
        });
    </script>

</body>
</html>
