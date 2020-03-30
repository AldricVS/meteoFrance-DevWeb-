<?php
    if(isset($_GET["reg"]) && !empty($_GET["reg"])){
        $region = $_GET["reg"];
    }else{
        header("Location: index.html");
    }
    require_once("includes/function.inc.php"); //on a vraiment besoin de ça pour afficher la page
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Choix du département</title>
        <meta name="descrption" content="On choisi ici le déparement qui est dans la région <?= $i /*mettre nom de la région depuis GET ici*/ ?> 
        depuis la liste des départemetns triés par ordre alphabétique"/>
        <?php require_once("includes/head.inc.php"); /*Besoin d'inclure decription et title quand même*/?>
    </head>
    <body>
        <?php include("includes/header.inc.php");?>
        <main>
            <h2>Départements de la région : <?= $i/*nom de la région*/?></h2>
            <div style="text-align:center;"><a class="button" href="index.html">Retour à l'accueil</a></div>
            <?php
                getDepFromRegion($region);
            ?>
        </main>
        <?php include_once("includes/footer.inc.php");?>
    </body>
</html>