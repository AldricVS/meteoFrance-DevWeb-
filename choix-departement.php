<?php
    //includes et check si $_GET["dep"] isset && !empty
    $i = 1; //temporaire
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Choix du département</title>
        <meta name="descrption" content="On choisi ici le déparement qui est dans la région <?= $i /*mettre nom de la région depuis GET ici*/ ?> 
        depuis la liste des départemetns triés par ordre alphabétique"/>
        <?php require_once("includes/head.inc.php"); /*Besoin d'inclure decription et title quand même*/?>
    </head>
    <body>
        <?php include_once("includes/header.inc.php");?>
        <main>
            <h2>Départements de la région : <?= $i/*nom de la région*/?></h2>
            <div style="text-align:center;"><a class="button" href="index.html">Retour à l'accueil</a></div>
            <?php /*une section, UNE LETTRE*/?>
            <section class="dep">
                <h2>A.</h2>
                <div>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                </div>
            </section>
            <section class="dep">
                <h2>B.</h2>
                <div>
                    <a class="button" href="salut.php">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                </div>
            </section>
            <section class="dep">
                <h2>E.</h2>
                <div>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                </div>
            </section>
            <section class="dep">
                <h2>G.</h2>
                <div>
                    <a class="button">Auvergne</a>
                    <a class="button">Auvergne</a>
                </div>
            </section>
        </main>
        <?php include_once("includes/footer.inc.php");?>
    </body>
</html>