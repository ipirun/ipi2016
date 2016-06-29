
 <?php

if(!empty($_POST)) {
	include_once 'customers.php';
	$old_customers = get_all_customers();

	$customer = $_POST;
	$customer['id'] = uniqid() ; 
	$old_customers[]=$customer;

	$result = json_encode(["data" => $old_customers]);
	$file = ('customer.json');
	file_put_contents($file, $result);

	include "index.php";	
} 