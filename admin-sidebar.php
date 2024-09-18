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
						<a href="admin-Dashboard.php" class="items">
							<i class="fas fa-chart-line"></i>
							<span>Dashboard</span>
						</a>
					</li>


					<p class="menu">Products & Services</p>
					<li id="headingThree1">
						<a href="#" class="submenu-items" data-toggle="collapse" data-target="#servicesMenu" aria-expanded="true" aria-controls="servicesMenu">
							<i class="fas fa-heartbeat"></i>
							<span>Services</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="servicesMenu" class="collapse submenu" aria-labelledby="headingThree1" data-parent="#sidebar-items">
						<ul>
							<li>
								<a href="admin-Services.php">View all services</a>
							</li>
							<li>
								<a href="admin-AddServices.php">Add new service</a>
							</li>
						</ul>
					</div>

					<li id="headingThree2">
						<a href="#" class="submenu-items" data-toggle="collapse" data-target="#productsMenu" aria-expanded="true" aria-controls="productsMenu">
							<i class="fas fa-box"></i>
							<span>Products</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="productsMenu" class="collapse submenu" aria-labelledby="headingThree2" data-parent="#sidebar-items">
						<ul>
							<li>
								<a href="admin-products.php">View all products</a>
							</li>
							<li>
								<a href="admin-AddProducts.php">Add new products</a>
							</li>
						</ul>
					</div>


					<!-- <p class="menu">Dashboard</p>

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
					</li> -->

					

					<p class="menu">Appointments</p>

					<li id="headingOne">
                        <a href="#" onclick="location.href='admin-BookingAppointments.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="far fa-calendar-alt"></i>
							<span>Bookings</span>
							
						</a>
					</li>


					<li id="headingThree">
                        <a href="#" onclick="location.href='admin-BookingHistory.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
                            <i class="fas fa-file-alt"></i>
                            <span>Booking History</span>
                        </a>
                    </li>

					<li id="headingThree">
                        <a href="#" onclick="location.href='admin-ServiceSales.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Booking sales</span>
                        </a>
                    </li>


					<p class="menu">Products</p>

					<li id="headingOne">
                        <a href="#" onclick="location.href='admin-ProductOrders.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fas fa-cart-plus"></i>
							<span>Product Orders</span>
							
						</a>
					</li>


					<li id="headingThree">
                        <a href="#" onclick="location.href='admin-Inventories.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
                            <i class="fas fa-file-alt"></i>
                            <span>Inventories</span>
                        </a>
                    </li>

					<li id="headingThree">
                        <a href="#" onclick="location.href='admin-ProductSales.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Product sales</span>
                        </a>
                    </li>


					
					<p class="menu">Resources</p>

					<li id="headingThree4">
						<a href="#" class="submenu-items" data-toggle="collapse" data-target="#UserMenu" aria-expanded="true" aria-controls="UserMenu">
							<i class="fa fa-id-badge"></i>
							<span>Users</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="UserMenu" class="collapse submenu" aria-labelledby="headingThree4" data-parent="#sidebar-items">
						<ul>
							<li>
								<a href="admin-Users.php">Account users</a>
							</li>
							<!-- <li>
								<a href="adminChangePassword.php">Guests customers</a>
							</li> -->
						</ul>
					</div>

					<li id="headingThree4">
						<a href="#" class="submenu-items" data-toggle="collapse" data-target="#BlogsMenu" aria-expanded="true" aria-controls="BlogsMenu">
							<i class="fas fa-edit"></i>
							<span>Blogs</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="BlogsMenu" class="collapse submenu" aria-labelledby="headingThree4" data-parent="#sidebar-items">
						<ul>
							<li>
								<a href="admin-Blog_List.php">View all blogs</a>
							</li>
							<li>
								<a href="admin-AddNew_Blogs.php">Add new blog</a>
							</li>
						</ul>
					</div>


					<p class="menu">Settings</p>

					<li id="headingThree">
                        <a href="#" onclick="location.href='admin-Notifications.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fas fa-bell"></i>
							<span>Notification</span>
						</a>
					</li>

					<li id="headingThree3">
						<a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#errros"
							aria-expanded="true" aria-controls="errros">
							<i class="far fa-id-card"></i>
							<span>My profile</span>
							<i class="fas la-angle-right"></i>
						</a>
					</li>
					<div id="errros" class="collapse submenu" aria-labelledby="headingThree3"
						data-parent="#sidebar-items">
						<ul>

							<li>
								<a href="admin-myProfile.php">Account Details</a>
							</li>
					
							<li>
								<a href="admin-ChangePassword.php">Change password</a>
							</li>

						</ul>
					</div>

                    
                    <li id="headingThree">
                        <a href="#" onclick="location.href='admin-Messages.php'" class="submenu-items" data-toggle="collapse" data-target="#forms" aria-expanded="true" aria-controls="forms">
							<i class="fa fa-envelope"></i>
							<span>Messages</span>
						</a>
					</li>

					
				</ul>
			</div>
		</div>
	</div>

	<div class="sidebar-overlay"></div>