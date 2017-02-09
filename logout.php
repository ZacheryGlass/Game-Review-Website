<!DOCTYPE html>
<!-- 


-->
<html lang="en">
<head>
	<title>Top Picks</title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container">
		<?php include "include/side.php"; ?>
		<div id="main" class="col-md-9">
		<h1>Login or Sign Up</h1>
		<br><br><hr>
		<?php 
			session_start();
			session_destroy();
			unset($_SESSION);
			header("Location: login.php");
		 ?><!-- end php -->
		</div><!-- end .col-md-8 -->
	</div><!-- /.container -->

	<?php include "include/footer.php" ?>
</body>
</html>
