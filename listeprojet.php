<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>
		CloudysFriends
	</title>
		<?php
			include('config.php');
			include('header.php');
		?>
	</head>
		<?php
		include('nav.php');
		
		?>
		<body>
			<div class="container">
				<h1>Top 10</h1>
				<div class="row">
				<?php 
				
				$place =0;
				foreach ($projettop10 as $projetid) {
				
					$place++;
					$projetid = $projetid['id'];
					$projet = $projets->get($id=$projetid);
				
				?>
				<br>
				<div class="col s12 m6">
				<div class="card orange">
					<div class="card-image orange">
		              <img src="<?php echo $projet['logo']; ?>">
		              <span class="card-title"><a style="color:#fff;font-size:30px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" href="projet_dashboard.php?id=<?php echo $projetid;  ?>"><?php echo $projet['name']." #$place";  ?></a></span>
		            </div>
					<div class="card-content">
						<p><?php echo $projet['description']; ?></p>
						
					</div>
					
				</div>
				</div>
				<?php
}
?></div>
					<h1>Les autres projets</h1>
					<?php
foreach ($projetslist as $projet) {
?>
						<br>
						<div class="white z-depth-2" style="padding:20px;">
							<h3><a style="color:#fff;font-size:30px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" href="projet_dashboard.php?id=<?php echo $projet["id"];  ?>"><?php echo $projet['name']." #$place";  ?></a></h3>
							<img style="width:100%;" src="<?php
	echo $projet['logo'];
?>"></h3>
						</div>

						<?php
} //$projetslist as $projet
?>
			</div>


			<?php
include('footer.php');


?>
</html>