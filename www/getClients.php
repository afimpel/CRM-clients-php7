<?php
// getData.php
require_once "bootstrap.php";

$ClientsRepository = $entityManager->getRepository('Clients');
$Clients = $ClientsRepository->findAll();
$data = array();
foreach ($Clients as $Client) {
	$data[] = array(
		"DT_RowId" => $Client->getId(),
		"name" => $Client->getName(),
		"lastname" => $Client->getLastname(),
		"email" => $Client->getEmail(),
		"groupClient" => $Client->getGroupClient()->getName(),
		"observations" => $Client->getObservations(),
	);
}
$jayParsedAry = array("data" => $data);
echo json_encode($jayParsedAry)
?>