<?php

/*
 * Controller executé lors de l'envoi du formulaire de création d'un client
 * Ici on délègue la création du client à partir des données de $_POST
 * et on redirige vers index.php (la liste des clients)
 */
if(!empty($_POST)) {
	include_once 'customers.php';

    create_customer($_POST);

	include "index.php";
}
