
    <div class="orange">
        <div class="container">
            <div class="row">
                <center>
                <div class="col s2">
                    <p>
                        <a class="white-text " href="?onglet=blog&id=<?php echo $_GET['id']; ?>">Blog</a>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <a class="white-text " href="?onglet=stats&id=<?php echo $_GET['id']; ?>"><i class="material-icons">insert_chart</i> Statistiques</a>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <a class="white-text " href="?onglet=presentation&id=<?php echo $_GET['id']; ?>">Presentation</a>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <a class="white-text " href="?onglet=mailgun&id=<?php echo $_GET['id']; ?>">MailGun</a>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <a class="white-text " href="?onglet=git&id=<?php echo $_GET['id']; ?>">git</a>
                    </p>
                </div>
                </center>
            </div>
        </div>
    </div>

    <div class="container">
        
        <?php
        
                    // echo "<h1>Dashboard du projet ".$projet['name']."</h1>";
                if(isset($_GET['onglet'])){
                    if ($_GET['onglet'] == 'blog'){
                        include('blog.php');
                    }elseif ($_GET['onglet'] == 'stats') {
                        include('statistiques.php');
                    }elseif ($_GET['onglet'] == 'presentation') {
                        include('presentation.php');
                    }elseif ($_GET['onglet'] == 'git') {
                        include('git.php');
                    }
                    elseif ($_GET['onglet'] == 'mailgun') {
                        include('mailgun.php');
                    }
                }else {
                    
                    echo "Hey! Bienvenue sur le dashboard du projet ".$projet['name'].".";
                    echo '<img style="width:100%;" src="'.$projet['logo'].'" />';
                    
                }
                ?>
    </div>