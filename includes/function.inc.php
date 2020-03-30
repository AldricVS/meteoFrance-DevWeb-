<?php
	function getDepFromRegion($reg=""){
		//avant, on regarde si le ficheir csv existe et si on peut l'utiliser
		$file = fopen('./csv/departements-region.csv', 'r') or die("Erreur lors de l'ouverture du fichier");
		$tmpReg = $reg;
		//on enlève le caractère '_' du département reçu 
		$reg = str_replace("_", " ", $reg);

		//3 infos dans le fichier : numDep, nomDep, nomRegion
		//on regarde alors si chaque departement est dans la région choisie
		//on va aussi regarder si l'initiale à déja été trouvée
		$list = array(); //tableau [initiale => nombre d'occurences]
		while(($data = fgetcsv($file)) !== false){
			if ($data[2] === $reg) { //si la région de la ligne est la région choisie
				$firstLetter = $data[1][0]; // prend l'initiale
				if(!isset($list[$firstLetter])){ //si l'entrée dans le tableau n'est pas encore créée
					$list += [$firstLetter => array()];
				}
				array_push($list[$firstLetter], $data);
			}
		}

		//on affiche tout dans la bonne forme
		foreach ($list as $init => $depart) {
			echo "\t\t\t<section class='dep' id='". $init ."'>\n";
			echo "\t\t\t\t<h2>". $init ." (". count($depart) ." département(s)). </h2>\n";
			foreach($depart as $elt){
				$depName = $elt[1];
				$depAndNumber = $depName . " (" . $elt[0] . ")";
				echo "\t\t\t\t<a class='choice' href=\"personnalisation-recherche.php?dep=" . $depName  ."&reg=". $tmpReg ."\">".$depAndNumber."</a>\n";
			}
			echo "\t\t\t</section>\n";
		}
    }
?>