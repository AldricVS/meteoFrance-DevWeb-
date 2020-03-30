<?php
    function selectdep($fletre, $dep){
        $csv_string = file_get_contents('./csv/dep.csv');
        $csv_dep =  str_getcsv($csv_string);
        $region = array( "Bretagne"=> 53,"Normandie" =>28,"Hauts-de-France" => 32, "Ile-de-France"=> 11,"Grand-Est"=>44, "Bourgone-Franche-Comté"=> 27, "Centre-Val_de_Loire"=> 24,"Pays_de_la_Loire"=> 52, "Nouvelle_Aquitaine"=> 75, "Auvergne-Rhône-Alpes"=> 84,"Provence-Alpes-Côte_d'azur"=> 93, "Occitanie"=> 76, "Corse"=> 94);
        $id_region=$region[$dep]; // id of region pass as parametre 
        
        for($i=0;$i<99;$i++){
            $r=$i*2+1;
            $t=2*$i;

          if( substr($csv_dep[$r],0,1)==$fletre){
              
                if($id_region==$csv_dep[$t]){

                 echo"<a class=\"choice\">".$csv_dep[$r]."</a>";  
                }
                
                
            }
        }
      //echo 
    }

	function getDepFromRegion($dep=""){
		//avant, on regarde si le ficheir csv existe et si on peut l'utiliser
		$file = fopen('./csv/departements-region.csv', 'r') or die("Erreur lors de l'ouverture du fichier");

		//on enlève le caractère '_' du département reçu 
		$dep = str_replace("_", " ", $dep);

		//3 infos dans le fichier : numDep, nomDep, nomRegion
		//on regarde alors si chaque departement est dans la région choisie
		//on va aussi regarder si l'initiale à déja été trouvée
		$list = array(); //tableau [initiale => nombre d'occurences]
		while(($data = fgetcsv($file)) !== false){
			if ($data[2] === $dep) { //si la région de la ligne est la région choisie
				$firstLetter = $data[1][0]; // prend l'initiale
				if(!isset($list[$firstLetter])){ //si l'entrée dans le tableau n'est pas encore créée
					$list += [$firstLetter => array()];
				}
				array_push($list[$firstLetter], $data);
			}
		}

		//on affiche tout dans la bonne forme
		foreach ($list as $init => $depart) {
			echo "\t\t\t<section class='dep'>\n";
			echo "\t\t\t\t<h2>". $init .". </h2>\n";
			foreach($depart as $elt){
				$depName = $elt[1];
				echo "\t\t\t\t<a class='choice' href='personnalisation-recherche.php?dep=" . $depName  ."'>".$depName."</a>\n";
			}
			echo "\t\t\t</section>\n";
		}
    }
?>