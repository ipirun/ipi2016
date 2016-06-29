<?php
include 'customers.php';

if(isset($_GET["id"])) {
    $customer = get_one_customer($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<form method="post" action="edit_customer.php">
   <fieldset>
       <legend>Vos coordonnées</legend> <!-- Titre du fieldset -->
       <p>
       <label for="company">Nom de la société : </label>
       <input type="text" name="company" id="company" />
       </p>
       <p>
       <label for="nom">Votre Nom : </label>
       <input type="text" name="firstname" id="firstname" />
	   </p>
	   <p>
       <label for="prenom">Votre Prénom : </label>
       <input type="text" name="lastname" id="lastname" />
       </p>
       <p>
       <label for="statut">Statut : </label><select name="signed" size="1">
			<option value="assigned">Attribué à un commercial</option>
			<option value="meeting">RDV pris</option>
			<option value="done">Contrat signé</option>
		</select>
       </p>
       <p>
       <input type="submit" value="Valider" />
       </p>
   </fieldset>
 </form>

 </html>

<?php
}
else {
    echo "Nothing here....";
}

 ?>
