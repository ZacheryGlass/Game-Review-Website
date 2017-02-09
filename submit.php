<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "include/head.php"; ?>
	<title>Submit a Review</title>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container">
		<?php include "include/side.php"; ?>
		<div id="main" class="col-md-9">
			<h1>Submit a Game for Review</h1>
			<?php
				if (!isset($_SESSION['id'])) {
					// user is NOT logged in
					print "<h3> You must be logged in to see this page.</h3><br>";
					print "<h5>Click <a href='login.php'>here</a> if you are not automatically redirected.</h5>";
					
					//redirect using HTML tag
					print "<meta http-equiv=\"refresh\" content=\"3;URL='login.php'\" />  ";

				} else if ( isset($_POST['game']) ) {
					// user is logged in AND form has been submitted
					// SO, save to database
					try {
						// connect to database
						$mysqli = new mysqli('localhost', 'root', '', 'review spot');

						// if errored throw exception
						if ($mysqli->connect_error)
							throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
						
						date_default_timezone_set('America/Chicago');
						$time = date("m/d/y h:iA");// set timestamp formate

						$query = "INSERT INTO reviews (game, user, title, rating, review, Date_Time)
									   VALUES ('{$_POST['game']}', '{$_SESSION['id']}', '{$_POST['reviewTitle']}', '{$_POST['stars']}', '{$_POST['reviewText']}', '{$time}')";

						// load from Database 
						if (!$mysqli -> query($query)){
							throw new Exception($mysqli->error);
						}// end if
						print "<h3>Your review has been submitted and is now public.</h3>";
					} catch (Exception $e) {
						print "<br>\n<pre>";
						print $e;
						print "</pre>\n<br>";
					}// end try-catch (SQL errors)
				} else {
					// user is logged in AND form has not been submitted
					try {
						if(!@include("submitForm.php")) throw new Exception("Failed to include 'submitForm.php'");
					} catch (Exception $e) {
						print "<br>\n<pre>";
						print $e;
						print "</pre>\n<br>";
					}
					
				}// end if-else chain (logged in / for submitted)
			?>
			
		</div><!-- /.col-md-8 -->
	</div><!-- /.container -->

	<?php include "include/footer.php"; ?>

</body>
</html>
