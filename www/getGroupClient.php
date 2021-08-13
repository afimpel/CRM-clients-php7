<?php
// getGroupClient.php
require_once "bootstrap.php";

$ClientsRepository = $entityManager->getRepository('GroupClient');
$Clients = $ClientsRepository->findAll();
$data = array();
foreach ($Clients as $Client) {
	$data[] = array(
		"value" => $Client->getId(),
		"name" => $Client->getName(),
	);
}

//getGroupClient.php
echo json_encode($data)
?>