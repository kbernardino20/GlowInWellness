<?php
// Check if enumber is not set in the session
if (!isset($_SESSION['email'])) {
    // Redirect to index.php if enumber is not set
    header("Location: index.php");
    exit(); 
} 

if (!($_SESSION['role'] == 'user')) {
  // Redirect to user-homepage.php if the user is not an user
  header("Location: admin-Dashboard.php");
  exit(); 
}
?>