<?php 
session_start();
include("admin_session.php");

// Include database connection
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    // Save form data to session in case of error
    $_SESSION['form_data'] = [
        'title' => $title,
        'author' => $author,
        'content' => $content
    ];

    if (!empty($_FILES["image"]["name"])) {
        // Image upload and validation
        $fileName = $_FILES["image"]["name"];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif", "JPG");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetDir = "Photos/Blogs/";
        $titleFile = preg_replace('/[^A-Za-z0-9]/', '_', $title);
        $newFileName = $titleFile . "." . $ext; 
        $targetPath = $targetDir . $newFileName;

        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $image_query_part = $newFileName;
            }
        } else {
            echo "<script>
                    alert('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
                    window.location.href = 'admin-AddNew_Blogs.php';
                  </script>";
            exit; // Stop further execution after error
        }
    } else {
        echo "<script>
                alert('No image uploaded. Please upload an image.');
                window.location.href = 'admin-AddNew_Blogs.php';
              </script>";
        exit; // Stop further execution after error
    }

    // Sanitize inputs
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $author = htmlspecialchars($author, ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

    // Get the current date
    $formatted_date = date('d F Y');

    // SQL query
    $sql = "INSERT INTO tbl_blog (title, author, content, post_date, blog_img) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($db_connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $title, $author, $content, $formatted_date, $newFileName);

        if (mysqli_stmt_execute($stmt)) {
            // Clear form data session
            unset($_SESSION['form_data']);
            echo "<script>
                    alert('New blog post created successfully!');
                    window.location.href = 'admin-Blog_List.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($db_connection);
    }

    mysqli_close($db_connection);
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

        @media only screen and (max-width: 768px) {
        .well div[style*="flex"] {
            flex-direction: column;
            margin-left: 0 !important;
        }

        .well img {
            width: 100%;
            height: auto;
        }

        .well input[type="text"], 
        .well textarea {
            width: 100%;
        }
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
    <br>
    <form method="post" enctype="multipart/form-data" style="text-align: left;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
            <!-- Left side: Image and Upload Button -->
            <div style="flex: 1; text-align: center; max-width: 100%; margin-bottom: 20px;">
                <img id="avatar" src="Photos/Blogs/blogs.jpg" 
                     style="width: 100%; max-width: 3in; height: auto; object-fit: cover;">
                <br><br>
                <div class="media-body ml-4">
                    <div id="fileName" style="margin-top: 8px;"></div>
                    <label class="btn btn-outline-primary">
                        Upload image
                        <input type="file" name="image" class="account-settings-fileinput" 
                               id="fileInput" style="display: none;">
                    </label> &nbsp;
                </div>
            </div>

            <!-- Right side: Blog Title and Author -->
            <div style="flex: 2; margin-left: 20px; max-width: 100%;">
                <br>
                <label style="color: #7E007F;" for="title"><b>Blog Title:</b></label><br>
                
                <input type="text" id="title" name="title" required style="width: 100%;" 
                       value="<?php echo isset($_SESSION['form_data']['title']) ? htmlspecialchars($_SESSION['form_data']['title']) : ''; ?>"><br><br>

                <label style="color: #7E007F;" for="author"><b>Author:</b></label><br>
                
                <input type="text" id="author" name="author" required style="width: 100%;" 
                       value="<?php echo isset($_SESSION['form_data']['author']) ? htmlspecialchars($_SESSION['form_data']['author']) : ''; ?>"><br><br>

            </div>
        </div>
        <br><br>
        <label style="color: #7E007F;" for="content"><b>Blog Content:</b></label><br>
        
        <textarea id="content" name="content" rows="10" style="width: 100%;"><?php echo isset($_SESSION['form_data']['content']) ? htmlspecialchars($_SESSION['form_data']['content']) : ''; ?></textarea><br><br>

        <div style="text-align: center;">
            <input type="submit" value="Post Blog" class="btn btn-primary btn-lg rounded w-lg mt-3">
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
