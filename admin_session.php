<?php
// Check if enumber is not set in the session
if (!isset($_SESSION['email'])) {
    // Redirect to index.php if enumber is not set
    header("Location: index.php");
} 

if (!($_SESSION['role'] == 'admin')) {
  // Redirect to user-homepage.php if the user is not an admin
  header("Location: user-homepage.php");
  exit(); 
}
?>