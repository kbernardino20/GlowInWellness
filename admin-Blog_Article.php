
<?php 
    session_start();
    include("admin_session.php");

    $Article = isset($_GET['title']) ? $_GET['title'] : '';

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
        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
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

<script src="https://cdn.tiny.cloud/1/3ow343u95tp9gm0xa92487s1zjp20mgooqppo0wgqhgbyqki/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    menubar: false, // Disable the menubar
    plugins: [
      // Only include the core features you need
      'lists', 'link', 'charmap', 'autolink', 'visualblocks', 'wordcount', 'codesample', 'table'
    ],
    toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat', // Customize your toolbar
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>



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
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-sm-9">
                                        
                                    <div class="well">
                                        <!-- Back to All Blogs aligned to the left -->
                                        <p style="text-align: left;"><a href="admin-Blog_List.php">&lt; Back to All Blogs</a></p>
                                        <br>
                                        <form method="post" enctype="multipart/form-data" style="text-align: left;">
                                            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
                                                <!-- Image Section -->
                                                <?php
                                                // Include database connection
                                                include('db_connect.php');

                                                // SQL query to fetch blog posts
                                                $sql = "SELECT * FROM tbl_blog WHERE title = '$Article'";
                                                $result = mysqli_query($db_connection, $sql);

                                                // Right side: Blog Title and Author
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<div style='text-align: center; width: 100%; max-width: 600px; margin-bottom: 20px;'>
                                                                <img id='avatar' src='Photos/Blogs/" . $row['blog_img'] . "' 
                                                                    style='width: 100%; height: auto; object-fit: cover; border-radius: 10px;'>
                                                            </div>";

                                                        echo "<div style='text-align: center; max-width: 600px; margin-bottom: 20px;'>";
                                                        echo "<h2 style=\"font-family: 'Sacramento', cursive; color: #7E007D;\">" . $row['title'] . "</h2>";
                                                        echo "<p style='font-size: 16px; color: #666;'>" . $row['post_date'] . " | Authored by: " . $row['author'] . "</p><br>";
                                                        echo "</div>";
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <!-- Separate Div for Blog Content -->
                                            <div style="margin-top: 20px; max-width: 600px; margin-left: auto; margin-right: auto;">
                                                <?php
                                                // Loop again for blog content
                                                if (mysqli_num_rows($result) > 0) {
                                                    // Move the result pointer back to the beginning
                                                    mysqli_data_seek($result, 0);

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $content = htmlspecialchars_decode($row['content']);
                                                        $content = str_replace('<p>', '<p style="font-size: 18px; line-height: 1.5; margin-bottom: 15px;">', $content);

                                                        echo "<div style='margin-bottom: 20px;'>";
                                                        echo $content;
                                                        echo "</div>";
                                                    }
                                                }
                                                ?>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div style="text-align: center; margin-top: 20px;">
                                                <a href="admin-delete_Blogs.php?title=<?php echo urlencode($Article); ?>" class="btn btn-outline-primary btn-lg rounded w-lg mt-3" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
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
