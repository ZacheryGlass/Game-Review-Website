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
			<h1>Login or Sign Up</h1>
			<br><br>
			<hr>
			<?php
				// if signup form not submitted, redirect to signup form
				if (!isset($_POST['username']))
					header("Location: login.php");


				$username  = stripslashes( strip_tags( $_POST['username']  ) );
				$password  = stripslashes( strip_tags( $_POST['password1'] ) );
				$password2 = stripslashes( strip_tags( $_POST['password2'] ) );

				if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
					// username does not match regex
					print "<h3>Sorry, the username you entered in not acceptable.</h3><br>";
					print "<h3>Please <a href='{$_SERVER['HTTP_REFERER']}'>try again</a>.</h3>";
					
				} else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,15}$/', $password)) {
					// password does not match regex
				    print "<h3>Sorry, the password you entered is not acceptable.</h3><br>";
					print "<h3>Please <a href='{$_SERVER['HTTP_REFERER']}'>try again</a> with a different password.</h3>";
				} else {
					// username and password are both accepted by regex

					// check if passwords match
					if ($password != $password2) {
						// passwords do NOT match
						print "<h3>Password Mismatch!</h3><br>";
						print "<h3>Please <a href=\"{$_SERVER['HTTP_REFERER']}\">try again</a>.</h3>";
					} else {
						// passwords DO match
						
						// encrypt password
						$password = md5($password);

						try {
							// connect to database
							$mysqli = new mysqli('localhost', 'root', '', 'review spot');

							// if errored throw exception
							if ($mysqli->connect_error)
								throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);

							// set SQL query
							$query = "SELECT `users`.`username` FROM `users`";

							$isTaken = false;

							// load from Database 
							if ($result = $mysqli -> query($query)){
								while($record = $result -> fetch_array(MYSQLI_ASSOC)) {	
									// non case sesative condition	
									if (strtolower($username) == strtolower($record['username'])) {
										print "<h3>Sorry, that username is already taken.</h3><br>";
										print "<h3>Please <a href=\"{$_SERVER['HTTP_REFERER']}\">try again</a> with a different username.</h3>";
										$isTaken = true;
										break;
									}// end if
								}// end while
							} else {
								throw new Exception($mysqli->error);
							}// end if else (load from database)

							if ($isTaken == false) {
								// username is not already taken
								// save new user/pass to database
								$query = "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')";

								if ($mysqli->query($query) === TRUE) {
								    print "<h3>You have successfully signed up!</h3><br>";
								    print "<h3>You can now <a href=\"{$_SERVER['HTTP_REFERER']}\">Login</a>.</h3>";
								} else {
								    throw new Exception($mysqli->error);
								}// end if else
							}// end if (! $isTaken)
						} catch (Exception $e) {
							print "<br><pre>";
							print $e;
							print "</pre><br>";
						}// end try-catch
					}// end if-else (password1 != password2)
				}// end if-else (password regex check)
			?><!-- end php -->
		</div><!-- end .col-md-8 -->
	</div><!-- /.container -->

	<?php include "include/footer.php" ?>

</body>
</html>
