<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "include/head.php";?>
	<title>Gamer's Review Spot</title>
</head>
<body>
	<?php include "include/nav.php"; ?>
	<div class="container">
		<?php include "include/side.php"; ?>
		<div id="main" class="col-md-8">
			<img class="cover" src="images/site_logo.png" alt="Gamer's Review Spot">
			<h3>Providing the best review since a couple days ago!</h3>
			<br><br>
			
			<div class="col-md-6" id="reviews">
				<h4>What is Gamer's Review Spot?</h4>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
				</p><br><br><br>
				Read reviews of your favorite games: 
				<a href="reviews.php"><button type="button" class="btn btn-default btn-sm">
					  Click<span style="padding: 0 .5em"class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
				</button></a>
			</div>
			<div class="col-md-6">
				<div class="screen">
					<a href="league_of_legends.php"><img heigth="300px" width="250px" src="images/league_of_legends_pc.jpg"></a>
					<a href="world_of_warcraft.php"><img heigth="300px" width="250px" src="images/world_of_warcraft_pc.png"></a>
					<a href="mortal_kombat_x.php"><img heigth="300px" width="250px" src="images/mortal_kombat_x_pc.png"></a>
					<a href="destiny.php"><img heigth="300px" width="250px" src="images/destiny_xb1.jpg"></a>
					<a href="mortal_kombat.php"><img heigth="300px" width="250px" src="images/mortal_kombat_x_xb1.jpg"></a>
					<a href="destiny.php"><img heigth="300px" width="250px" src="images/destiny_ps4.jpg"></a>
					<a href="mortal_kombat_x.php"><img heigth="300px" width="250px" src="images/mortal_kombat_x_ps4.png"></a>
				</div>
			</div>
		</div>
	</div>	

	<?php include "include/footer.php"; ?>

	<script>
	  $(function(){
	  $('.screen > :gt(0)').hide();
	  setInterval(function(){
	    var rand = Math.floor(Math.random() * ($('.screen').children().length-1));
	    $('.screen > :first-child').appendTo('.screen').fadeOut();
	    $('.screen > *').eq(rand).prependTo('.screen').fadeIn();
	  }, 3000);
	});
	</script>
</body>
<style type="text/css">
	body {
		overflow: auto;
	}
</style>
</html>
