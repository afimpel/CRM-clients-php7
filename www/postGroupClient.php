<?php
require_once "bootstrap.php";
$actions = $_POST['actions'];
$eid = 0;
if ($actions['type'] == "edit") {
	$eid = $actions['value'];
	$info = $_POST['info'];
	$editItem = $entityManager->getRepository('GroupClient')->find($eid);
	$editItem->setName($info['GCnameVal']);
	$entityManager->persist($editItem);
	$entityManager->flush();
	echo "Groupo de Cliente: " . $editItem->getName();
} elseif ($actions['type'] == "add") {
	$GroupClient = new GroupClient();
	$info = $_POST['info'];
	$GroupClient->setName($info['GCnameVal']);
	$entityManager->persist($GroupClient);
	$entityManager->flush();
	echo "Groupo de Cliente: " . $GroupClient->getName();
}