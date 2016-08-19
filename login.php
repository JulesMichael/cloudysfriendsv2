<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>CloudysFriends
        <?php if(!empty($_TITLE)){echo ' | '.$_TITLE ; } ?>
    </title>
    
<?php
    include('config.php');
    include('header.php');
    include('nav.php');
    if($userstatus == false){
		if(!empty($_POST["pseudo"]) and !empty($_POST["password"])){

				$username = $_POST["pseudo"];
				$password = $_POST["password"];

				
				if($users->login($username,$password)){
				   $message = "Vous avez bien été connecté" ;
				}else {
				    $message = "Vous n'avez pas été conecté";
				    
				    
				}
			
			}
	}else{
	           $users->logout();
	    	$message = "Vous avez été déconnecté";
		
	}

    
?>
<div class="container">
<h1>Login</h1>
<div class="row">
    <form class="col s12" method="post">
	<?php
		if($message){
		echo "<p>$message</p>";	
		}
	?>
      <div class="row">
        <div class="input-field col s6">
          <input id="pseudo" type="text" class="validate" name="pseudo">
          <label for="pseudo">Pseudo</label>
        </div>
        <div class="input-field col s6">
          <input name="password"  type="password">
          <label for="password">Mot de pass</label>
        </div>
      </div>
      <input type="submit" value="Connexion !" class="waves-effect waves-light btn" name=""/>
    </form>
  </div>
</div>
<?php
    include('footer.php');
?>
