<?php
    //à faire dynamiquement
    $todayDate = "2020-03-28"; /*date s'écrit de la manière suivante : yyyy-mm-dd*/
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
        <p class="desc">Département : <?= $depName ?></p>
        
        <div class="double-buttons">
            <?php /*On garde le nom du département et de la région pour pouvoir revenir en arrière*/?>
            <a class="button" href="choix-departement.php?reg=<?=$_GET["reg"]?>">Retour au choix du département</a>
            <a class="button" href="index.html">Retour à l'accueil</a>
        </div>

        <form method="GET" action="resultats.php">
            <input type='hidden' name='reg' value=<?=$_GET["reg"]?> />
            <input type='hidden' name='dep' value=<?=$depName?> />
            <select name="vil" id="ville-cb" value="Choix de la ville" required="required">
                <?php //liste villes du département ici?>
                <option value="" selected="selected" disabled="disabled">Choix de la ville</option>
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
                <input type="date" name="date" id="date" value=<?=$todayDate?> required="required"/>

                <label for="hr">à</label>
                <input type="number" id="hr" name="hr" min="0" max="23" value=<?= $currHour?> required="required"/>
                <label for="hr">heures</label>

                <div class="time-slots">
                    <table>
                        <tr>
                            <td>
                                <label for="ph">Plage horaire : </label>
                                <input type="number" name="ph" id="ph" min="1" max="12" value="1"/>
                            </td>
                        <td>
                            <div>
                                <input type="radio" name="durtype" id="heure" value="hr" checked="checked"/>
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
                            </label>
                        </td>
                    </table>
                </div>
            </div>

            <p class="desc">Paramètres optionnels</p>

            <div class="param-opt">
                <input type="checkbox" id="vent" name="vent" value="y"/>
                <label for="vent">Vitesse du vent</label>
                <input type="checkbox" id="poll" name="poll" value="y"/>
                <label for="poll">Pollution atmosphérique</label>
                <input type="checkbox" id="pop" name="pop" value="y"/>
                <label for="vent">Nombre d'habitants</label>
            </div>

            <div class="centered">
                <input type="submit" value="Lancer la recherche!"/>
            <div>
        </form>
    </main>
</body>
</html>