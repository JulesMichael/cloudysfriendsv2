<?php
$repo = Git::open($projet["repo"]);  // -or- Git::create('/path/to/repo')
$branches = $repo->list_branches();
$description = $repo->get_description();

$files = scandir($projet["repo"]);
unset($files[0]);
unset($files[1]);
unset($files[2]);
?>
<!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown1'><?php echo $branches[0]; ?></a>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <?php
        foreach ($branches as $branche) {
            echo "<li><a href=\"#!\">$branche</a></li>";
        }
    ?>
</ul>
<?php
if (!$description =="Unnamed repository; edit this file 'description' to name the repository.") {
    echo "<p>Description git : $description</p>";
}
?>

 <ul class="collapsible" data-collapsible="accordion">
    <li>
    <?php
        foreach ($files as $file) {
            echo "<div class=\"collapsible-header\"><img height=\"30px\"src=\"/img/icones/fichier.png\"/><img height=\"30px\"src=\"/img/icones/dossier.png\"/> $file</div>";
            echo "<div class=\"collapsible-body\"><p>Lorem ipsum dolor sit amet.</p></div>";
        }
    ?>
      
    </li>
  </ul>
<?php   
  
//$repo->add('.');
//$repo->commit('Some commit message');
//$repo->push('origin', 'master');
?>