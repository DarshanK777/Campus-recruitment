<?php include('server.php'); 

// if user is not logged in they cannot access
if(empty($_SESSION['username'])) {
	header('location: home.php');
}
?>
<html>
	<head>
		<title>Registration and login/logout Form</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		
		
		<div id="main-wrapper">
			<h1> Home page </h1>
			<hr>
			<?php if (isset($_SESSION['success'])): ?>
					<div class="error success">
						<h3>
							<?php 
								echo $_SESSION['success'];
							    unset($_SESSION['success']);
							?>
						</h3>
						
					</div>
			<?php endif ?>

			<?php if(isset($_SESSION["username"])): ?>
				<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
				<p class="logout" ><a href="index.php?logout='1'" style="color:red;">Logout</a></p>
			<?php endif ?>

		</div>
		
	</body> 
</html>
		