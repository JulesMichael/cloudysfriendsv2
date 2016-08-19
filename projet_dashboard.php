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
include('nav.php');
?>

<?php if (!empty($_GET['id'])){
   $projet =  $projets->get($_GET['id']);
   if($projet){
       if($userstatus){
           //var_dump($projet);
           if( in_array($projet,$projets->userprojects($_SESSION["id"])) ){ 
               
                include("projet_dashboard/manage.php");
           }
       }
   }else{
       echo "<div class='container'>Ce projet n'existe pas :/</div>";
   }
                ?>
    </div>
    
<?php
}else{

		echo "<div class='container'>vous n'avez pas entré d'id</div>";
		
}
    include('footer.php');
?>
