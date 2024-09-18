      <?php 
      if ($_SESSION['user_role'] == "admin"){
        echo "<br><br><br><br>";
      } else {
        echo "<br><br><br><br><br><br><br><br><br><br>";
      }        
      ?>
      
      <p style="color: #337AB7; text-align: center;">
      You are logged in as: <br>
      <i class="fa fa-user-circle-o"></i> <strong><?php echo $_SESSION['enumber'] . " - " . strtoupper($_SESSION['user_role']); ?></strong>
        <br><br>
      <span id="loginTime"></span>
      </p>