
<?php 
    session_start();
    include("admin_session.php");

    include("input-validation.php"); 
    //include("admin-AddService_process.php");

    //include("admin-UpdateServices_process.php"); 

    include("db_connect.php");

    $selectedService = isset($_GET['selectedservice']) ? $_GET['selectedservice'] : '';

    $query = "SELECT * FROM tbl_services WHERE service = '$selectedService'";
    $result = $db_connection->query($query);

    while ($row = $result->fetch_assoc()) {

        $ServiceDesc = $row['service_description'];
        $ServicePrice = $row['price'];
        $ServiceImg = $row['Service_image'];
        $ServiceCategory = $row['Service_Category'];
        $ServiceDuration = $row['duration'];
    }

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
        <link rel="stylesheet" href="assets/css/leadmark.css">
<link rel="stylesheet" href="CSS/topbar-admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
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
            font-family: 'Satisfy', cursive;
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
            
                
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        <div class="well">
                                            <br>
                                            <form method="post" enctype="multipart/form-data" style="text-align: center;" action="admin-UpdateServices_process.php">
                                                <img id="avatar" src="<?php echo "Photos/Services/" .$ServiceImg ?>" style="width: 3.5in; height: 2in; object-fit: cover;">
                                                <br><br>
                                                <div class="media-body ml-4">
                                                    <div id="fileName" style="margin-top: 8px;"></div><br>
                                                    <label class="btn btn-outline-primary">
                                                        Upload photo
                                                        <input type="file" name="image" class="account-settings-fileinput" id="fileInput" style="display: none;">
                                                    </label> &nbsp;
                                                    <?php echo isset($image_error) ? "<br><h10 style='color:red; font-size: 10px;'>" . $image_error . "</h10>" : "" ?>
                                                </div>
                                                <br><br>
                                                <label style="color: #7E007F;" for="servicecategory">Category</label>
                                                <select class="form-control" name="therapy">
                                                    <option value="Remedial Massage Therapy" <?php echo ($ServiceCategory == 'Remedial Massage Therapy') ? 'selected' : ''; ?>>Remedial Massage Therapy</option>
                                                    <option value="Bowen Therapy" <?php echo ($ServiceCategory == 'Bowen Therapy') ? 'selected' : ''; ?>>Bowen Therapy</option>
                                                    
                                                </select>
                                                <br>
                                                <label style="color: #7E007F;" for="servicetitle">Service Title</label>
                                                <?php echo isset($sv_error) ? "<br><h10 style='color:red; font-size: 10px;'>" . $sv_error . "</h10>" : "" ?>
                                                <input type="text" class="form-control" name="servicetitle" placeholder="Enter text here" value="<?php echo $selectedService; ?>">
                                                <input type="hidden" class="form-control" name="servicetitle_hidden" value="<?php echo $selectedService; ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="servicedesc">Description</label>
                                                <?php echo isset($desc_error) ? "<br><h10 style='color:red; font-size: 10px;'>" . $desc_error . "</h10>" : "" ?>
                                                <textarea class="form-control" name="servicedesc" rows="4" cols="50" placeholder="Enter text here"><?php echo $ServiceDesc; ?></textarea>
                                                <br>
                                                <label style="color: #7E007F;" for="serviceprice">Price</label>
                                                <?php echo isset($price_error) ? "<br><h10 style='color:red; font-size: 10px;'>" . $price_error . "</h10>" : "" ?>
                                                <input type="text" class="form-control" name="serviceprice" placeholder="Enter text here" value="<?php echo $ServicePrice; ?>">
                                                <br>
                                                <label style="color: #7E007F;" for="serviceduration">Duration (in minutes)</label>
                                                <?php echo isset($dur_error) ? "<br><h10 style='color:red; font-size: 10px;'>" . $dur_error . "</h10>" : "" ?>
                                                <input type="text" class="form-control" name="serviceduration" placeholder="Enter text here" value="<?php echo $ServiceDuration; ?>">
                                                <br>
                                                <div class="d-flex justify-content-center">
                                                    <a href="admin-Services.php" class="btn btn-outline-primary btn-lg rounded w-lg mt-3">Back</a>
                                                    <input type="submit" class="btn btn-primary btn-lg rounded w-lg mt-3 ml-3" value="Submit" name="submit">
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
