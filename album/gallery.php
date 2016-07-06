<?php
/**
* Créer un galerie a partir d'un dossier
* @var string folder_to_follow : le dossier ou les images doivent être listé
* @return array : la liste des images
*/
function recuperation_image($folder_to_follow){
  //On recupere une image depuis un dossier
	$files = scandir($folder_to_follow);
  //Liste des images
	unset($files[0]);
	unset($files[1]);
  //suppression des 2 premieres valeurs:
  //  le repertoire courant (.)
  //  le repertoire parent (..)

	return $files;
}


/**
* Traitement de l'affichage de la gallerie
* Affichage de taille 3*3 images
* Image responsive
* @var int no_file: le numéro de la derniere image affiché
*/
function afficher_galerie($no_file){
	$folder_to_scan = "images";
  //le dossier a scanner
	$files = recuperation_image($folder_to_scan);
  //la liste des images recupere
	$max_file = count($files)+2;
  //Drapeau representant la liste des image
	$limit_img = $no_file+9;
  //Drapeau represetant la derniere image a afficher dans la gallerie

	$tabimg = $no_file;
  //Drapeau de parcours de la liste des images à afficher
	 do {
     //FAIRE la gallerie des image
		 echo "<div class='row'>";
     //On créer une ligne d'image
		 for ($i=0 ; $i<3 ; $i++){
       //On ajoute 3 images par ligne
			 if($tabimg < $max_file){
				 echo "<div class='col-xs-3'>";
				 echo "<img src='".$folder_to_scan."/".$files[$tabimg]."' class='thumbnail img-responsive center-block' alt='".$files[$tabimg]."'  data-toggle='modal' data-target='#myModal' />";
				 echo "</div>";
				 $tabimg++;
			 }else {
			 	//On ferme la ligne
				echo "</div>";
				return;
			 }
		 }
     //On ferme la ligne
		 echo "</div>";
	} while ($tabimg < $limit_img);
  //TANT QUE le drapeau de liste et inferieur au drapeau de limite d'image par gallerie
}
?>
