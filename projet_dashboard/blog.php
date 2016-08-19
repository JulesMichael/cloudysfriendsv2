
<h3>Blog</h3>

<div class="blog  white z-depth-2" style="padding:20px;">
    <h3>Nouveau post rapide</h3>
    <form name="post" methode="post" action="">
        <input type="text" name="title" placeholder="Titre du post" />

        <textarea name="post" class="materialize-textarea" placeholder="Ecrivez ce qui vous passe par la tete :D"></textarea>
        <label for="post"></label>
        <input class="btn" type="submit" value="Submit" />
    </form>
</div><br>

<h3>Vos posts:</h3>
<?php

$curentb = $blog->get($projetid=$projet["id"]);
foreach ($curentb["post"] as $post) {
?>
<div class="blog  white z-depth-2" style="padding:20px;">
<?php
    echo "<h3>".$post["name"]."</h3>";
    echo $post["contenu"].'<br>';
    echo '<span class="large material-icons">thumb_up</span> <span class="large material-icons">thumb_down</span><br>';
    echo "<h5> Commentaire(s):</h5><ul class=\"collection\">";
    foreach ($post["commentaires"] as $commentaire) {
       echo "<li class=\"collection-item avatar\"><img src=\"https://zestedesavoir.com/media/galleries/516/6274e51c-8a66-437c-91d4-65fafd7c769a.png\" class=\"circle\">";
       echo $commentaire["contenu"]."<br>" ;
       echo "<a href=\"#!\" class=\"secondary-content\">Répondre</a></li>";
    }
    ?>
    </ul></div><br>
    <?php
}

?>
<!--<div class="blog  white z-depth-2" style="padding:20px;">-->
<!--    <h3>Derniers commentaires</h3>-->
<!--    <ul class="collection">-->

<!--        <li class="collection-item avatar">-->
<!--            <img src="https://zestedesavoir.com/media/galleries/516/6274e51c-8a66-437c-91d4-65fafd7c769a.png" alt="" class="circle">-->
<!--            <span class="title">Dans Blueflap 5.2016.706 est dispo sur le Windows Store par Bouh</span><br>-->
<!--            <p><br>J'adore voir mes stats en général genre le nombre de vidéo vu sur youtube dans le mois ou même depuis toujours. La liste des sites les plus ouvert pourrais être sympa, tout est sympa avec les stats ! Des beau graph avec le nombre de page-->
<!--                vu dans le mois, tu pense mettre ça dans blueflap ? Au passage il faut obligatoirement un compte Microsoft pour téléchargé depuis le store, en plus j'ai fait des bidouille sur mon pc et le store ne fonctionne plus. En parlant de ce qui-->
<!--                ne fonctionne plus, le lien de ton site est dead. Y a t-il un moyen plus "basique" d'avoir Blueflap ?<br>-->
<!--            </p>-->
<!--            <a href="#!" class="secondary-content">Répondre</a>-->
<!--        </li>-->
<!--        <li class="collection-item avatar">-->
<!--            <img src="https://lh5.googleusercontent.com/-NcVo9vUM_Zs/AAAAAAAAAAI/AAAAAAAAARo/o7urPSbNnwg/s32-c-k-no/photo.jpg" alt="" class="circle">-->
<!--            <span class="title">Dans Quelques petites statistiques réjouissantes à vous partager ! par the_new_sky</span>-->
<!--            <p><br>Incroyable ! Félicitations pour ce petit buzz !<br>-->
<!--            </p>-->
<!--            <a href="#!" class="secondary-content"><i class="material-icons">Répondre</i></a>-->
<!--        </li>-->


<!--    </ul>-->

<!--</div>-->
