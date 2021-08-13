<?php
require_once "bootstrap.php";
$actions = $_POST['actions'];
$eid = 0;
if ($actions['type'] == "delete") {
	$eid = -1;
	$lista = "";
	foreach ($_POST['info'] as $id) {
		$deleteItem = $entityManager->getRepository('Clients')->find($id);
		$lista .= $deleteItem->getName() . " " . $deleteItem->getLastname() . "\n";
		$entityManager->remove($deleteItem);
		$entityManager->flush();
	}
	echo $lista . "   Total: " . count($_POST['info']);
} elseif ($actions['type'] == "edit") {
	$eid = $actions['id'];
	$info = $_POST['info'];
	$editItem = $entityManager->getRepository('Clients')->find($eid);
	$GroupClient = $entityManager->find("GroupClient", $info['groupClient']);
	$editItem->setGroupClient($GroupClient);
	$editItem->setName($info['name']);
	$editItem->setLastname($info['lastname']);
	$editItem->setEmail($info['email']);
	$editItem->setObservations($info['observations']);
	$entityManager->persist($editItem);
	$entityManager->flush();
	echo "nombre: " . $editItem->getName() . "\n" .
		"Apellido: " . $editItem->getLastname() . "\n" .
		"email: " . $editItem->getEmail() . "\n" .
		"Groupo de Cliente: " . $editItem->getGroupClient()->getName() . "\n" .
		"observaciones: " . $editItem->getObservations();
} elseif ($actions['type'] == "add") {
	$Client = new Clients();
	$info = $_POST['info'];
	$GroupClient = $entityManager->find("GroupClient", $info['groupClient']);
	$Client->setGroupClient($GroupClient);
	$Client->setName($info['name']);
	$Client->setLastname($info['lastname']);
	$Client->setEmail($info['email']);
	$Client->setObservations($info['observations']);
	$entityManager->persist($Client);
	$entityManager->flush();
	echo "nombre: " . $Client->getName() . "\n" .
		"Apellido: " . $Client->getLastname() . "\n" .
		"email: " . $Client->getEmail() . "\n" .
		"Groupo de Cliente: " . $Client->getGroupClient()->getName() . "\n" .
		"observaciones: " . $Client->getObservations();
}