<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php

$data = array();
$data = file_get_contents("data.json");
$data = (array) json_decode($data);

//print_r($data);

$jour = date("w"); // numéro du jour actuel
 
if (isset($_GET['jour']))
{
    $jour = intval($_GET['jour']);
}
 
if ($_GET['week'] == "pre") // Si on veut afficher la semaine précédente
{
    $jour = $jour + 7;
}
elseif ($_GET['week'] == "next") // Si on veut afficher la semaine suivante
{
    $jour = $jour - 7;
}
 
$nom_mois = date("F"); // nom du mois actuel
$annee = date("Y"); // année actuelle
$num_week = date("W"); // numéro de la semaine actuelle
 
if (isset($_GET['week']))
{
    $nom_mois = date("F", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $annee = date("Y", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $num_week = date("W", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
}
 
$dateDebSemaine = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
$dateFinSemaine = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$jour+7,date("y")));
     
$dateDebSemaineFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
$dateFinSemaineFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$jour+7,date("y")));
 

echo '<div id="titreMois" align="center">
		<a href="test.php?week=pre&jour='.$jour.'"><-</a>
		Semaine '.$num_week.'
		<a href="test.php?week=next&jour='.$jour.'">-></a><br/>
    du '.$dateDebSemaineFr.' au '.$dateFinSemaineFr.'</div>';
 
$jourTexte = array('',1=>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$plageH = array(1=>'09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');
 
switch($nom_mois)
{
    case 'January' : $nom_mois = 'Janvier'; break;
    case 'February' : $nom_mois = 'Février'; break;
    case 'March' : $nom_mois = 'Mars'; break;
    case 'April' : $nom_mois = 'Avril'; break;
    case 'May' : $nom_mois = 'Mai'; break;
    case 'June' : $nom_mois = 'Juin'; break;
    case 'July' : $nom_mois = 'Juillet'; break;
    case 'August' : $nom_mois = 'Août'; break;
    case 'September' : $nom_mois = 'Septembre'; break;
    case 'October' : $nom_mois = 'Octobre'; break;
    case 'November' : $nom_mois = 'Novembre'; break;
    case 'December' : $nom_mois = 'Décembre'; break;
}
 
echo '<br/>
<div id="titreMois" align="center">
    <h2>'.$nom_mois.' '.$annee.'</h2>
</div>';
 
echo '<table border="1" align="center">';
 
    // en tête de colonne
    echo '<tr>';
    for($k = 0; $k <= 7; $k++)
    {
        if($k==0)
            echo '<th>'.$jourTexte[$k].'</th>';
        else
            echo '<th><div>'.$jourTexte[$k].' '.date("d/Y", mktime(0,0,0,date("n"),date("d")-$jour+$k,date("y"))).'</div></th>';
         
    }
    echo '</tr>';
 
    // les 2 plages horaires : matin - midi
    for ($h = 1; $h <= 11; $h++)
    {
        echo '<tr>
        <th>
            <div>'.$plageH[$h].'</div>
        </th>';
 
        // les infos pour chaque jour
            for ($j = 1; $j <= 7; $j++)
            {
				$reserver="";
				$creneau=date("Y-m-d H:00", mktime($plageH[$h],0,0,date("n"),date("d")-$jour+$j,date("y")));
				foreach($data as $z => $tt){
					//echo $creneau;
					if ($z==$creneau){
				
							$reserver="ok";
					}
				}
	
                echo "<td>$reserver
                </td>";
            }
            echo '</td>
            </tr>';
    }
echo '</table>';


?>
</body>
</html>