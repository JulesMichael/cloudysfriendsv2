<?php
session_start();
require 'lib/parsedown/Parsedown.php';
require('lib/Mailgun/Mailgun.php');
require('lib/gitphp/Git.php');
function config(){
    // Variables du site
     $config = array('datasdir' => 'datas/');   
    return $config;
}

//Générer une chaine de caractère unique et aléatoire
function random($car) {
$string = "";
$chaine = "abcdefghijklmnpqrstuvwxy1234567890AZERTYUIOPQSDFGHJKLMWXCVBN123456789";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}


function filetovar($file){
    $json = file_get_contents($file);
    return json_decode($json,true);
    
}

function vartofile($file,$var){
    $fp = fopen($file, 'w');
    fwrite($fp,json_encode($var,JSON_PRETTY_PRINT));
    fclose($fp);
    return true;
}






/////////////
// Projets //
/////////////

class projet{
    function get($id=false,$json=false){
		if ($id != false){
		 $to_return = false;
             foreach (filetovar("datas/projets.json") as $projet) {
                 if ($id == $projet["id"]  ) {
                     $to_return = $projet;
                 }
             }
             return $to_return;
		}else{
			return filetovar('datas/projets.json');
		}
        if(!$json == false){
            $select = json_encode($select);
        }
    }
    
    function userprojects ($id){
        $array = array();
       
        foreach (filetovar('datas/projets.json') as $projet) {

           if ($projet['idadmin'] == $id) {
               array_push($array,$projet);
           }elseif(in_array($id,$projet["members"])){
               array_push($array,$projet);
           }
        }
		 return $array;
    }
	function usersteams($userid){
		#return bdd()->query("SELECT * FROM `team` WHERE `name_admin` = '$admin' ");
		$teamslist = array( );
		foreach ($teams as $team){
		    if ($team['idadmin'] == $userid or $team['memberid'] == $userid){
		        array_push($teamslist,$team);
		    } 
		}
		return $teamlist;
	}
    
    function top($number=10){
		foreach (filetovar('datas/vues.json') as $vue){
		if (!$projettop10[$vue['idprojet']]){
		    $projettop10[$vue['idprojet']] = 0;
		}
		$projettop10[$vue['idprojet']] = $projettop10[$vue['idprojet']] + 1;
		    
		}
	    arsort($projettop10);
	   // print_r($projettop10);
	    foreach ($projettop10 as $id => $value){
	        $projettop10[$id] = array ("id" => $id , "value" => $value);
	    }
	    $projettop10 = array_slice($projettop10,0,$number);
		return $projettop10;
	}
    function add (){
        
    }
    function upadte (){
        
    }
    function mail  (){
        return (new mail);
    }
}

class mail{
    function send ($mail){
        $mg = new Mailgun("key-example");
        $domain = "example.com";

        # Now, compose and send your message.
        $mg->sendMessage($domain, $mail);
    }
}

///////////// 
//  USERS  //
/////////////

class user {
    function get ($id=false,$username=false,$email=false,$passwordnomd5=false){
        if ($username != false and $passwordnomd5 != false){
            $to_return = false;
             foreach (filetovar("datas/users.json") as $user) {
                
                 if ($username == $user["username"] and md5($password) == $user["password"] ) {
                     
                     $to_return = $user;
                 }
             }
             return $to_return;
        }elseif($username != false and $email !=false){
              $to_return = false;
             foreach (filetovar("datas/users.json") as $user) {
                 if ($username == $user["username"] and $email == $user["email"] ) {
                     $to_return = $user;
                     return $to_return;
                 }
             }
             
        }elseif ($username != false){
              $to_return = false;
             
             foreach (filetovar("datas/users.json") as $user) {
                 if ($username == $user["username"]) {
                     $to_return = $user;
                     return $to_return;
                 }
             }
              return $to_return;
        }elseif ($id != false) {
			 $to_return = false;
             foreach (filetovar("datas/users.json") as $user) {
                 if ($id == $user["id"]) {
                     $to_return = $user;
                 }
             }
              return $to_return;
        }elseif ($email != false) {
              $to_return = false;
             foreach (filetovar("datas/users.json") as $user) {
                 if ($email == $user["email"] ) {
                     $to_return = $user;
                 }
             }
              return $to_return;
        }else{
             try {
                 return filetovar('datas/users.json');
             } catch (Exception $e) {
                 return false;
             }
        }
        
    }
    
    function add($name,$password,$password2,$email){
       $error = array();
       $usedusername = false;
       $usedmail = false;
       
        $to_return = false;
         foreach (filetovar("datas/users.json") as $user) {
             if ($email == $user["email"] ) {
                 $usedmail = $user;
             }
         }
             
       foreach (filetovar("datas/users.json") as $user) {
                 if ($name == $user["username"]) {
                     $usedusername = $user;
                    
                 }
             }
             
       if ($usedusername){
           array_push($error,'Cet username est deja utilisé.');
       }
       if ($usedmail){
           array_push($error,'Cet email est deja utilisé.');
       }
       
       if($password != $password2){
           array_push($error,"Les mots de pass ne corespondent pas.");
       }
       if(empty($error)){
           $users = filetovar("datas/users.json");
           $id=end($users)["id"]+1;
           $newuser = array("id"=> $id ,"username" => $name , "password" => md5($password),"email"=>$email);
           array_push($users,$newuser);
           vartofile("datas/users.json",$users);
           return array(true,"Vous avez bien été inscrit");
        
       }else {
           return array(false,"Il y a eu une ou plusisur erreur: \n ".join(" ",$error));
       }
    }
    
    function ban(){
        
    }
    
    function remove(){
        
    }
    
    function login($username,$password){
        $to_return = false;
             foreach (filetovar("datas/users.json") as $user) {
                 if ($username == $user["username"] and md5($password) == $user["password"] ) {
                     
                     $to_return = $user;
                 }
             }
		if ($to_return) {
		    $_SESSION['id'] = $to_return["id"];
		    $_SESSION['username'] = $to_return["username"];
		   return $to_return;
		}else{
		    return false;
		}
    }
    
    function iflogin (){
        if (!empty( $_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
    
    function logout(){
        session_destroy();
    }
}

//////////
// Blog //
//////////

class blog {
    function creat(){
        
    }
    function post(){
        return (new post);
    }
    function get ($projetid=false){
        if ($projetid != false){
		 $to_return = false;
             foreach (filetovar("datas/blog.json") as $blog) {
                 if ($projetid == $blog["idprojet"]  ) {
                     $to_return = $blog;
                 }
             }
             return $to_return;
		}else{
			return filetovar('datas/blog.json');
		}
        if(!$json == false){
            $select = json_encode($select);
        }
    }
}

class post{
    function add(){
        
    }
    function remove(){
        
    }
    function update(){
        
    }
}


//////////
// Stat //
//////////

class stat {
    function vues($projetid,$timestamp=false){
        $vues = filetovar('datas/vues.json');
        $array = array();
        if ($timestamp==false){
             foreach ($vues as $vue) {
                if ($projetid == $vue["idprojet"]){
                     array_push($array,$vue);
                }
            }
            
        }else{
            
            foreach ($vues as $vue) {
                if ($projetid == $vue["idprojet"] and $vue["time"] <=  $timestamp ){
                     array_push($array,$vue);
                }
            }
            
        }
        //asort($array);
        return $array;
    }
}
$users = new user();
$projets = new projet();
$stats = new stat();
$blog = new blog();
$parsedown = new Parsedown();

$userstatus = $users->iflogin();
$userslist =  $users->get();

$projetslist = $projets->get();
$projettop10 = $projets->top();
?>
