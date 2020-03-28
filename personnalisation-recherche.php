<?php
    $depName = "Auvergne"; //à enlever
    $todayDate = "2020-03-28"; /* date s'écrit de la manière suivante : yyyy-mm-dd*/
    $currHour = "12"; //minutes non comptées
    $unauthorized = false;
    if(!isset($_GET["dep"]) && empty($_GET["dep"]))
        $unauthorized = true;
    else{
        $depName = $_GET["dep"]; 
        //check si le département est dans la liste, sinon, $unauthorized = true;
    }

    if($unauthorized){
        //L'utilisateur veut aller sur la page en bidouillant, du coup retour à l'accueil pour lui
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Personnalisation de la recherche</title>
    <meta name="description" content="Une fois la région et le département choisi (ici <?= $depName/*NOM DEPARTEMENT CHOISI*/?>), 
    il ne reste plus qu'à choisir  la ville dans laquelle on veut voir la météo, la date, 
    la plage horaire et des paramètres supplémentaires"/>
    <?php require_once("includes/head.inc.php");?>
</head>
<body>
    <?php include("includes/header.inc.php");?>
    <main>
        <h2>Personnalisation du résultat</h2>
        <p class="desc">Département : <?= $depName /**/?></p>
        
        <div class="double-buttons">
            <?php /* Il faudra remettre le lien vers la page précédente dynamiquement, ex: 'choix-departement.php?dep=Ile_de_France'*/?>
            <a class="button" href="choix-departement.php?dep=<?=$depName?>">Retour au choix du département</a>
            <a class="button" href="index.html">Retour à l'accueil</a>
        </div>

        <form method="GET" action="resultats.php">
            <select name="vil" id="ville-cb" value="Choix de la ville" required>
                <option value="" selected disabled>Choix de la ville</option>
                <option value="Ville_1">Ville_1</option>
                <option value="Ville_2">Ville_2</option>
                <option value="Ville_3">Ville_3</option>
                <option value="Ville_4">Ville_4</option>
                <option value="Ville_5">Ville_5</option>
                <option value="Ville_6">Ville_6</option>
                <option value="Ville_7">Ville_7</option>
            </select>
            
            <div class="timesheet_options">
                <label for="date">Le</label>
                <input type="date" name="date" id="date" value=<?=$todayDate?> required/>

                <label for="hr">à</label>
                <input type="number" id="hr" name="hr" min="0" max="23" value=<?= $currHour?> required/>
                <label for="hr">heures</label>

                <div class="time-slots">
                    <label for="ph">Plage horaire</label>
                    <input type="number" name="ph" id="ph" min="1" max="12" value="1"/>
                    <div>
                        <input type="radio" name="durtype" id="heure" value="hr" checked/>
                        <label for="heure">heure(s)</label>
                    </div>
                    <div>
                        <input type="radio" name="durtype" id="jour" value="jr"/>
                        <label for="jour">jour(s)</label>
                    </div>
                    <div>
                        <input type="radio" name="durtype" id="semaine" value="sm"/>
                        <label for="semaine">semaine(s)</label>
                    </div>
                </div>
            </div>

            <div class="param-opt">
                <p class="dessc">Paramètres optionnels</p>
                <input type="checkbox" id="vent" name="vent" value="y"/>
                <label for="vent">Vitesse du vent</label>
                <input type="checkbox" id="poll" name="poll" value="y"/>
                <label for="poll">Pollution atmosphérique</label>
                <input type="checkbox" id="carte" name="carte" value="y"/>
                <label for="vent">Carte des environs</label>
            </div>

            <input type="submit" value="Lancer la recherche!"/>
        </form>
    </main>
</body>
</html>