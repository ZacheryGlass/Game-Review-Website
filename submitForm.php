<link rel="stylesheet" href="include/project.css">
<form role='form' method='POST' action='submit.php'>
	<div class='form-group'>
		<!-- Select Game -->
		<!-- php to load list from database -->
		<?php 
			try {
				// connect to database
				$mysqli = new mysqli('localhost', 'root', '', 'review spot');
				
				// check if errored
				if ($mysqli->connect_error)
					throw new Exception('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);

				$query = "SELECT `id`, `name` FROM `games`";

				// load from Database 
				if ($result = $mysqli -> query($query)){
					print "<label for='name'>Which game do you want to review?</label>";
					print "<select class='form-control' name='game'>";
					while($record = $result -> fetch_array(MYSQLI_ASSOC)) {		
						print "<option value='{$record['id']}'";
						if (isset($_GET['game']) && $_GET['game'] == $record['id'])
							print " selected";
						print ">{$record['name']}</option>\n";
					}// end while
					print "</select>";
				} else {
					throw new Exception($mysqli->error);
				}// end if
			} catch (Exception $e) {
				print "<br><pre>";
				print $e;
				print "</pre><br>";
			}// end try-catch
		 ?>
		<!-- Stars -->
		<label for='sel1' class='form-group'>Rating:</label><br>
		<label class='radio-inline'>
			<input type='radio' name='stars' value="1" required>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
		</label>
		<label class='radio-inline'>
			<input type='radio' name='stars' value="2" required>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
		</label>
		<label class='radio-inline'>
			<input type='radio' name='stars' value="3" required>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
		</label>
		<label class='radio-inline'>
			<input type='radio' name='stars' value="4" required>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star-empty"></span>
		</label>
		<label class='radio-inline'>
			<input type='radio' name='stars' value="5" required>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
		</label>

		<!-- Review Title -->
		<div class='form-group'>
			<input type='text' placeholder='Review Title' id="reviewTitle" name='reviewTitle' required>
			<textarea rows='10' placeholder='What did you think about this game?' name="reviewText" required></textarea>
		</div>

		<!-- Submit Button -->
		<?php print "<button type='submit' class='btn btn-default submit'>Submit as {$_SESSION['username']}</button>"; ?>
	</div><!-- /.formgroup -->
</form>