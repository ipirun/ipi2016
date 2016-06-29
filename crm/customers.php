<?php
const DB_FILE = "customer.json";

function get_all_customers($params=null)
{
    // On va lire le fichier customer.json qui contient la liste des clients
    $customers_db = file_get_contents(DB_FILE);

    // On va en faire un tableau php
    $customers = json_decode($customers_db, true);

    return $customers["data"];
}

function get_one_customer($id)
{
    $customers = get_all_customers();

    $result_customer = [];

    foreach ($customers as $customer) {
        if ($customer["id"] == $id) {
            $result_customer = $customer;
        }
    }

    return json_encode($result_customer);
}

function write($data)
{
    // $fp = fopen('customer.json', 'w');
    // fwrite($fp, json_encode($data));
    // fclose($fp);
}
