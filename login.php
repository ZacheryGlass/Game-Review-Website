<!DOCTYPE html>
<!-- 
This page handles both 


-->
<html lang="en">
<head>
	<title>Login</title>
	<?php include "include/head.php"; ?>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container">
		<?php include "include/side.php"; ?>
		<div id="main" class="col-md-8">
			<h1>Login or Sign Up</h1>
			<br><br><hr>
			<?php 
			if (isset($_SESSION['id'])) {
				// redirect away
				header("Location: index.php");
			}// end if

			// user is not logged in
			// continue
			if (isset($_POST['username'])) {
				// login form has been submitted
				// so check login credentials

				// prevent  SQL injections
				$username = strip_tags($_POST['username']); 
				$username = stripslashes($username); 
				$password = strip_tags($_POST['password']);
				$password = stripslashes($password);

				// encrypt password
				$password = md5($password);
				try {

					// connect to database
					$mysqli = new mysqli('localhost', 'root', '', 'review spot');

					// if errored throw exception
					if ($mysqli->connect_error)
						throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);

					$isFound = false;// used to check if username exists in database

					// set SQL query
					$query = "SELECT `users`.`username` FROM `users`";

					// load from Database 
					if ($result = $mysqli -> query($query)){
						while($record = $result -> fetch_array(MYSQLI_ASSOC)) {		
							if (strtolower($username) == strtolower($record['username'])) {
								// Username found in database
								$isFound = true;
								break;
							}// end if
						}// end while
					} else {
						throw new Exception($mysqli->error);
					}// end if else (load from database)

					if ($isFound) {
						// username exists in database
						// check if entered password for matches database password for entered
						$query = "SELECT `users`.`id`, `users`.`username`, `users`.`password` FROM `users` WHERE UPPER(`users`.`username`) = UPPER('{$username}')";
						if ($result = $mysqli -> query($query)) {
							if (!$record = $result -> fetch_array(MYSQLI_ASSOC))
								throw new Exception("Error: $result -> fetch_array(MYSQLI_ASSOC) returned 'FALSE'");

						    if ($password == $record['password'] ) {
						    	// passwords match
						    	$_SESSION['username'] = $record['username'] ;
						    	$_SESSION['id'] = $record['id'];
						    	print "<h3>You have successfully logged in.</h3>";
						    	header("Location: index.php");// redirect
						    } else {
						    	print "<p class='error'>The password you entered does not match the password on file.</p>";
						    	printForms();
						    }// end if (password match)
						} else {
							throw new Exception($mysqli->error);
						}// end if else (load from database)
					} else {
						print "<p class='error'>The username you entered does not exist.</p>";
						printForms();
					}// end if-else ($isFound)
				} catch (Exception $e) {
					print "<br>\n<pre>";
					print $e;
					print "</pre>\n<br>";
				}// end try-catch (SQL errors)
			} else {
				// form has not been submitted
				printForms();
			}// end if (Form Submitted) else (Form not submitted)
		 ?><!-- end php -->
	   		</div> <!-- /container -->
		</div><!-- end .col-md-8 -->

	<?php include "include/footer.php" ?>

	<script>
		function showorhide1() {
			    document.getElementById('spoiler2').className = "collapse";
		}// end function

		function showorhide2() {
		    document.getElementById('spoiler1').className = "collapse";
		}// end function

	</script>
</body>

<?php 
function printForms() {
	print "
		<table id='loginTable'>
			<tr>
				<td><button data-toggle='collapse' data-target='#spoiler1' type='button' class='btn btn-info' onclick='showorhide1()'>Login</button></td>
				<td><button data-toggle='collapse' data-target='#spoiler2' type='button' class='btn btn-info' onclick='showorhide2()'>Sign Up</button></td>
			</tr>
		</table>
		<div id='spoiler1' class='collapse'>
			<form method='post' action='login.php'>
				<table id='login'>
					<tr>
						<td>
							<ul>
								<li>Username <strong>is NOT</strong> case-sensative</li>
								<li>Password <strong>IS</strong> case-sensative</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<input class='top' type='text' name='username' placeholder='Username' required><br>
							<input class='bottom' type='password' name='password' required placeholder='Password'>
						</td>
					</tr>
					<tr>
						<td>
							<button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button>
						</td>
					</tr>
				</table>
			</form>
		</div><!-- end #spolier1-->
		<div id='spoiler2' class='collapse'>
			<ul style='width: 80%; margin: auto; border-bottom: dotted black 2px; padding-bottom: 40px; margin-bottom: 40px;'>
				<li>Usernames must contain only letters, numbers, and underscores.</li>
				<li>Usernames must be at least 1 character and no longer than 15 characters.</li>

				<li>Passowrds must include at least one upper case letter, one lower case letter, and one numeric digit.</li>
				<li>Passwords must be at least 4 characters and no longer than 15 characters.</li>
			</ul>
			<form id='signUpForm' method='post' action='signup.php'>
				<table id='signup'>
					<tr>
						<td>
							<input type='text' name='username' placeholder='Choose username' required class='top'>
							<br>
							<input type='password' name='password1' placeholder='Choose password' required class='middle'>
							<br>
							<input type='password' name='password2' placeholder='Enter password again'required class='bottom'>
						</td>
					</tr>
					<tr>
						<td><button class='btn btn-lg btn-primary btn-block' type='submit'>Sign Up</button></td>
					</tr>
				</table>
			</form>
		</div><!-- end #spoiler2 -->";

}// end printForms()
 ?>
</html>
