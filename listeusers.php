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
<div class="container">
    <h1>Liste des users</h1>
    <?php
        if($userstatus){
			
			if ($users->get($id=$_SESSION['id'])->fetch(PDO::FETCH_ASSOC)['role'] == 'admin'){
				foreach ($userslist as $user) {
					echo $user['username'].' ';
					if ($user['emailauth']==1){
						echo $user['email'];
					}else{
						echo'Le mail est secret';			
					}
				}
		}else{
				echo 'Vous devez etre admin pour acceder a cette page';
		}
	}else{
				echo 'Vous devez etre connecter pour acceder a cette page';
		}
    ?>
</div>
<?php
    include('footer.php');
?>
