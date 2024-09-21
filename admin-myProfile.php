
<?php 
    session_start();
    include("admin_session.php");

    include("input-validation.php"); 
    include("admin-profile_update.php");

?>

<!doctype html>
<html lang="en">
  <head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6858343273703359"
     crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Glow in Wellness - Admin Dashboard</title>

		<!-- Bootstrap CSS-->
        <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
        <!-- Style CSS (White)-->
        <link rel="stylesheet" href="assets/css/White.css">
        <!-- Style CSS (Dark)-->
        <link rel="stylesheet" href="assets/css/Dark.css">
        <!-- FontAwesome CSS-->
        <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
        <!-- Icon LineAwesome CSS-->
        <link rel="stylesheet" href="assets/vendors/lineawesome/css/line-awesome.min.css">
        <link rel="stylesheet" href="CSS/topbar-admin.css">
        <link rel="stylesheet" href="assets/css/leadmark.css">

        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/leadmark.css">


	<style>
		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.left-items {
			display: flex;
			align-items: center;
		}
		.date-display {
			margin-right: 20px;
			color: #ffffff; /* Adjust color as needed */
		}
		.date-label {
			margin-right: 5px;
		}

        .sectitle {
            font-family: 'Sacramento', cursive;
            color: #7E007D;

        }
		

</style>

</head>
<body>
  
<!--Topbar -->
<?php include("admin-topbar.php");?>


		<!--Sidebar-->
        <?php include("admin-sidebar.php");?>


	<!--Content Start-->
	<div class="content transition text-center">
		<div class="container-fluid dashboard">
            
                <h6 class="mb-0 " style="font-size: 50px; font-family: 'Sacramento', cursive; color: #7E007F;"><i class="far fa-id-card"></i> My profile</h6> <br>
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <div class="well">
                                            <br>
                                            <form method="post" enctype="multipart/form-data" style="text-align: center;">
                                                
                                                <img id="avatar" src="<?php echo "Photos/USER/" .  $_SESSION['user_img']; ?>" style="width: 2in; height: 2in; object-fit: cover;">

                                                <br><br>
                                                <div class="media-body ml-4">
                                                    <div id="fileName" style="margin-top: 8px;"></div><br>
                                                    <label class="btn btn-outline-primary">
                                                        Upload new photo
                                                        <input type="file" name="image" class="account-settings-fileinput" id="fileInput" style="display: none;">
                                                    </label> &nbsp;
                                                </div>
                                                <br><br>
                                                <label style="color: #7E007F;" for="firstname">First Name</label>
                                                <?php echo isset($fn_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $fn_error . "*</h10>" : "" ?>
                                                <input type="text" class="form-control" name="firstname" value="<?php echo (isset($_POST['firstname']) ? $_POST['firstname'] : $_SESSION['first_name']); ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="lastname">Last Name</label>
                                                <?php echo isset($ln_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $ln_error . "*</h10>" : "" ?>
                                                <input type="text" class="form-control" name="lastname" value="<?php echo (isset($_POST['lastname']) ? $_POST['lastname'] : $_SESSION['last_name']); ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="dept">Mobile number</label>
                                                <?php echo isset($dept_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $dept_error . "*</h10>" : "" ?>
                                                <input type="text" class="form-control" name="dept" value="<?php echo (isset($_POST['dept']) ? $_POST['dept'] : $_SESSION['mobile_num']); ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="email">Email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>" disabled>
                                                <input type="hidden" name="email_hidden" value="<?php echo $_SESSION['email']; ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="enumber">Username</label>
                                                <?php echo isset($enumber_error) ? "<h10 style='color:red; font-size: 10px;'>*" . $enumber_error . "*</h10>" : "" ?>
                                                <input type="text" class="form-control" name="enumber" value="<?php echo (isset($_POST['enumber']) ? $_POST['enumber'] : $_SESSION['enumber']); ?>">
                                                <br>
                                                <input type="submit" class="btn btn-primary btn-lg rounded w-lg mt-3" value="Update" name="submit">
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

	<!-- Footer -->
	<div class="footer transition">
		<hr>
		<p class="mb-0 small text-center">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, GLOW IN WELLNESS MASSAGE THERAPY - All rights reserved </p> 
	</div>

	<!-- Loader -->
	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div class="loader-overlay"></div>

	<!-- Library Javascipt-->
	<script src="assets/vendors/bootstrap/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/js/script.js"></script>
 </body>
</html>

<script>
// JavaScript to insert the current date
document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var dateString = today.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('current-date').textContent = dateString;
});



document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar').src = e.target.result;
            }
            reader.readAsDataURL(file);

            // Display the file name
            document.getElementById('fileName').textContent = "Selected file: " + file.name;
        }
    });

</script>
