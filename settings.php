<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container">
		<?php include "include/side.php"; ?>
		<div id="main" class="col-md-9">
			<h1>Account Settings</h1>
			<br>
			<hr>
			<?php
				if (!isset($_SESSION['id']))
				{
					// user is NOT logged in
					print "<h3> You must be logged in to see this page.</h3><br>";
					print "<h5>Click <a href='login.php'>here</a> if you are not automatically redirected.</h5>";
					
					//redirect using HTML tag
					print "<meta http-equiv=\"refresh\" content=\"3;URL='login.php'\" />  ";

				}// end if (Logged in)
			?>

			<form method="post">
				<table class='settingsTable'>
					<tr>
						<th colspan="2">Change Your Password</th>
					</tr>
					<tr>
						<td>Enter your current password: </td>
						<td><input type="password" name="currentPassword" required></td>
					</tr>
					<tr>
						<td>Enter your new password: </td>
						<td><input type="password" name="newPassword" required></td> 
					</tr>
					<tr>
						<td>Enter your new password again: </td>
						<td><input type="password" name="newPassword2" required></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="Submit"></td>
					</tr>
				</table>
			</form>
			<br><br><br><!-- sorry for this -->
			<form method="post">
				<table class='settingsTable'>
					<tr>
						<th colspan="2">Delete Account</th>
					</tr>
					<tr>
						<td>Enter your password: </td>
						<td><input type="password" name="currentPassword" required></td>
					</tr>
					<tr>
						<td>Are you sure you want to permanately delete your account and all reviews you have submitted?</td>
						<td><input type="checkbox" name="deleteConfirmation" required>  Yes, delete my account</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="Submit"></td>
					</tr>
				</table>
			</form>



		</div><!-- end .col-md-8 -->
	</div><!-- /.container -->

	<?php include "include/footer.php" ?>

</body>
</html>
