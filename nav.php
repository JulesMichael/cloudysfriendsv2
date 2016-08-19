<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Cloudy'sFriends</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="listeprojet.php">Liste des projets</a></li>
        <?php
        if($userstatus){
		?>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="login.php">Déconnexion</a></li>
		<?php
		}else{
		?>
		<li><a href="login.php">Connexion</a></li
		<li><a href="register.php">Inscription</a></li
		<li><a href="about.php">Découvrir Cloudy's friends</a></li>
		<?php
		}
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
