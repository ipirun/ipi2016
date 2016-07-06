<?php

/*
 * Controller executé lors de l'envoi du formulaire d'édition d'un client
 * On vérifie qu'un id client a bien été passé par le formulaire :
 *   - Si le client existe bien en base de données
 *   - On délegue le traitement d'édition en base de donnée
 *   - Redirection vers index.php (la liste des clients )
 */
if(!empty($_POST)) {
	include_once 'customers.php';

    if(!empty($_POST["id"])) {

        $customer = get_one_customer($_POST["id"]);

        if($customer) {
            delete_one_customer($customer["id"], $_POST); //POST contient les nouvelles valeurs
        }

    	include "index.php";
    }

}
