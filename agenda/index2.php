

<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootstrapwp
 */

 ?><!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Projet Agenda</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="./css/bootstrap.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./js/bootstrap.js"></script>

<div class="container">
<div class="row">
<
<div id="banner" class="jumbotron">
<h1 style="color:black;">Agenda</h1>
<div ><p style="color:black;">Ajout de rendez-vous en fonction des disponibilité des commerciaux
</p></div>
<p><a class="btn btn-primary btn-lg" href="#" role="button" >En savoir plus</a></p>
</div>
</div>
</div>

<div class="container">
<div class="row">

</head>


<body>


  <!-- Mon bouton déroularant
  **/ -->


<div class="container">
<div class="row">
  <div class="column">
    <div class="col-md-12">

      <?php
      	if(isset($_POST["client"])){


      		$data = array();
      		$data = file_get_contents("data.json");
      		$data = (array) json_decode($data);
      		$data[$_POST["creneau"]] = $_POST;
      		//print_r($data);
      		file_put_contents("data.json",json_encode($data));
      	}
      ?>
      	<form action="index2.php" method="post">
       <p>nom : <select name="commercial">
        <option value="commercial2">Mr PAYET</option>
        <option value="commercial1">Mr GRONDIN</option>
        <option value="commercial3">Mr TURPIN</option>
      </select></p>

       <p>creneau : <select name="creneau">
         <option value="2016-07-07 09:00">Jeudi 9h</option>
         <option value="2016-07-07 10:00">Jeudi 10h</option>
         <option value="2016-07-07 11:00">Jeudi 11h</option>
         <option value="2016-07-07 12:00">Jeudi 12h</option>
        <option value="2016-07-07 13:00">Jeudi 13h</option>
        <option value="2016-07-07 14:00">Jeudi 14h</option>
        <option value="2016-07-07 15:00">jeudi 15h</option>
        <option value="2016-07-07 16:00">jeudi 16h</option>
        <option value="2016-07-07 17:00">jeudi 17h</option>
        <option value="2016-07-07 18:00">jeudi 18h</option>
        <option value="2016-07-07 19:00">jeudi 19h</option>
      </select></p>
      client: <input type="text" name="client"><br>
       <p><input type="submit" value="OK"></p>

      </form>


    </div>
  </div>



<!-- Agenda
**/ -->
<div class="container">
<div class="row">
  <div class="column">
    <div class="col-md-6">

<table class="table">


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

							$reserver="réserver";
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

</table>

</div>
</div>
</div>
</div>









</body>
</html>
