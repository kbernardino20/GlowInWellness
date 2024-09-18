	<div class="sidebar transition overlay-scrollbars">
		<div class="logo">
		<a href="index.php">
    <img src="assets/imgs/logo-admin.svg" alt="">
</a>
		</div>

		<div class="sidebar-items">
			<div class="accordion" id="sidebar-items">
				<ul>

					<p class="menu">Dashboard</p>

					<li>
						<a href="user-homepage.php" class="items">
							<i class="fas fa-heartbeat"></i>
							<span>Services</span>
						</a>
					</li>
                    <li>
						<a href="user-products.php" class="items">
							<i class="fas fa-box"></i>
							<span>Products</span>
						</a>
					</li>

					
					<p class="menu">Resources</p>

					<li id="headingOne">
                        <a href="#" onclick="location.href='user-MyAppointments.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="far fa-calendar-alt"></i>
							<span>My Appointments</span>
							
						</a>
					</li>


					<li id="headingThree">
                        <a href="#" onclick="location.href='user-TransactionHistory.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
                            <i class="fas fa-file-alt"></i>
                            <span>Transaction History</span>
                        </a>
                    </li>

                    <li id="headingThree">
						<a href="#" onclick="location.href='user-MyOrders.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fas fa-cart-plus"></i>
                            
							<span>My cart</span>
							
						</a>
					</li>

					<li id="headingThree">
						<a href="#" onclick="location.href='user-Orders.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fas fa-tags"></i>
                            
							<span>My orders</span>
							
						</a>
					</li>

					<li id="headingThree">
						<a href="#" onclick="location.href='user-OrderHistory.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fas fa-archive"></i>
                            
							<span>Order history</span>
							
						</a>
					</li>


					<p class="menu">Settings</p>

					<!-- <li id="headingThree">
                        <a href="#" onclick="location.href='user-Notif.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fa fa-envelope-square"></i>
							<span>Messages</span>
						</a>
					</li> -->

					<li id="headingThree">
						<a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#errros"
							aria-expanded="true" aria-controls="errros">
							<i class="far fa-id-card"></i>
							<span>My profile</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="errros" class="collapse submenu" aria-labelledby="headingThree"
						data-parent="#sidebar-items">
						<ul>

							<li>
								<a href="user-myProfile.php">Account Details</a>
							</li>
					
							<li>
								<a href="user-ChangePassword.php">Change password</a>
							</li>


						</ul>
					</div>

                    
                    <li id="headingThree">
                        <a href="#" onclick="location.href='user-Contactus.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="far fa-comment-alt"></i>
							<span>Contact us</span>
						</a>
					</li>

					
				</ul>
			</div>
		</div>
	</div>

	<div class="sidebar-overlay"></div>