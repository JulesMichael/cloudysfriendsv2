<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
CloudysFriends
</title>

<?php
include('config.php');
?>
<head>
<?php include('header.php'); ?>
</head><?php
include('nav.php');
echo '<body style="">'
?>

    <center>
        <div class="row">
            <br>
            <div class="col s6" style="height:100%;">
                <h1>Mes projets</h1>
                <div class="row">
                    
                <?php
                if ($userstatus){
				echo'<a class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a>';
				if(count($projets->userprojects($_SESSION['id'])) == 0){
						echo "Vous n'avez pas encore de projet. Vous pouvez toujours en creer un. <br>".'<a class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a>';
				}
                foreach($projets->userprojects($_SESSION['id']) as $projet){
				
				?>
				<div class="col s12 l6">
				
				 <div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title"><?php echo $projet['name']; ?></span>
						<p><?php echo $projet['description']; ?></p>
					</div>
					<div class="card-action">
						<a href="projet_dashboard.php?id=<?php echo $projet['id'] ;?>">Gerer ce projet</a>
			
					</div>
				</div>
				</div>
				<?php
					
				}}
                ?>
  
                    
                </div>
            </div>
            <div class="col s6" style="height:100%;">
                <h1>Mes teams</h1>
                <div class="row">
                    <div class="col s12">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Card Title</span>
                                <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php
    include('footer.php');
?>
