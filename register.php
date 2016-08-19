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
        
        ?>
    </head>
    <body>
    <div class="container">
    <h1>Inscription</h1>
    <form action="" method="post">
    <?php
    if(!empty($_POST['username']) or !empty($_POST['email']) or !empty($_POST['password']) or !empty($_POST['password2']) ){
    
    echo  $users->add($name=$_POST['username'],$password=$_POST['password'],$password2=$_POST['password2'],$email=$_POST['email'])[1];
    }
    ?>
    <input id="username" placeholder="username" type="text" class="validate" name="username"/>
    <input placeholder="email" name="email" class="validate"  type="email"/>
    <input placeholder="password" name="password" class="validate" type="password"/>
    <input name="password2" placeholder="Password ( encore )" class="validate" type="password"/>
    <input type="submit" value="Inscription !" class="waves-effect waves-light btn" name=""/>
    </form>
    
    </div>
    <?php
        include('footer.php');
    ?>
</body>