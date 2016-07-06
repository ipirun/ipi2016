<?php

/*
 * Constante contenant l'emplacement de la base de données
 */
const DB_FILE = "customer.json";


/**
 * Retourne toute la liste des clients de la base de données
 *
 * TODO: Faire de requete paramètrables avec limites/Order
 * @param  $params    array  Paramètre pour la recherche liste
 * @return $customers array  Représente la liste des Customers
 */
function get_all_customers($params=null)
{
    // On va lire le fichier customer.json qui contient la liste des clients
    $customers_db = file_get_contents(DB_FILE);

    // On va en faire un tableau php
    $customers = json_decode($customers_db, true);

    return $customers["data"];
}


/**
 * Cherche le client en base de données et renvoie le client sous forme
 * d'array php
 *
 * @param  $id              string  L'Identifiant unique du Customer
 * @return $result_customer array   Représente le customer recherché
 */
function get_one_customer($id)
{
    $customers = get_all_customers();

    $result_customer = [];

    foreach ($customers as $customer) {
        if ($customer["id"] == $id) {
            $result_customer = $customer;
        }
    }
    return $result_customer;
}


/**
 * Cherche le client en base de données et le modifie puis persiste en base
 * de données
 *
 * @param $id string   L'Identifiant unique du Customer
 * @param $data array  Contient les nouvelles valeurs pour le client
 */
function edit_one_customer($id, $values)
{
    $customers = get_all_customers();

    foreach ($customers as $index => $customer) {
        if ($customer["id"] == $id) {
            $customers[$index]["company"] = $values["company"];
            $customers[$index]["firstname"] = $values["firstname"];
            $customers[$index]["lastname"] = $values["lastname"];
            $customers[$index]["signed"] = $values["signed"];
        }
    }

    write_in_json($customers);

}


/**
 * Cherche le client en base de données et l'efface et persiste en base de données
 *
 * @param $id string   L'Identifiant unique du Customer
 */
function delete_one_customer($id)
{
    $customers = get_all_customers();

    foreach ($customers as $index => $customer) {
        if ($customer["id"] == $id) {
            unset($customers[$index]);
        }
    }

    write_in_json($customers);
}

/**
 * Crée un nouveau client avec un uniqid puis le persiste dans la base de données
 *
 * @see uniqid
 * @param $data array Contient les nouvelles valeurs pour le client
 */
function create_customer($values)
{
    $old_customers = get_all_customers();

	$customer = $values;
	$customer['id'] = uniqid() ;

    //Ajout nouveau client à l'array contenant les anciens clients
	$old_customers[] = $customer;

    write_in_json($old_customers);
}


/**
 * Persiste les données dans la base de données json
 *
 * @param $data array Contient la liste entières des clients à persister
 */
function write_in_json($data)
{
    $result = json_encode(["data" => $data]);
    $file = (DB_FILE);
    file_put_contents($file, $result);
}
