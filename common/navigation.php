<div id="topbar">
	<img src="images/cigars_edit.jpg" alt="banner">
</div>
<header class="sticky">
	<!-- Navigation -->
	<nav id="nav-bar">
		<ul id="desktop-bar">
			<li class="logo">
				<a href="index.php"><img class="logo-placeholder" src="images/LogoEdit.png" alt="logo"></a>	
			</li>
			<li class="name"><a href="index.php">The Last Draw</a></li>
			<li class="link"><a href="cigars.php">Cigars</a></li>
			<li class="link"><a href="history.php">History</a></li>
			<li class="link"><a href="contact.php">Contact</a></li>
			<li class="link">
				<a href="<?php echo ($user_data != NULL) ? 'account.php' : 'login_page.php'; ?>">
					<?php echo $status; ?>	
				</a>
			</li>
		</ul>
		<ul id="mobile-bar">
			<li class="logo">
				<a href="index.php"><img class="logo-placeholder" src="images/LogoEdit.png" alt="logo"></a>	
			</li>
			<li class="blank"><p>Test</p></li>
			
			<li class="menu">
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				</a>
				<div class="dropdown-content">
				    <a href="cigars.php">Cigars</a>
				    <a href="history.php">History</a>
				    <a href="contact.php">Contact</a>
				    <a href="<?php echo ($user_data != NULL) ? 'account.php' : 'login_page.php'; ?>">
						<?php echo $status; ?>	
					</a>
				</div>
			</li>
		</ul>
	</nav>
</header>