<?php
// dashboard.php
require_once "bootstrap.php";

function rand_chars($c, $l, $u = FALSE)
{
	if (!$u) for ($s = '', $i = 0, $z = strlen($c) - 1; $i < $l; $x = rand(0, $z), $s .= $c{
		$x}, $i++);
	else for ($i = 0, $z = strlen($c) - 1, $s = $c{
		rand(0, $z)}, $i = 1; $i != $l; $x = rand(0, $z), $s .= $c{
		$x}, $s = ($s{
		$i} == $s{
		$i - 1} ? substr($s, 0, -1) : $s), $i = strlen($s));
	return $s;
}

$debug = [];
$iii = rand(2, 6);
for ($i = 1; $i <= $iii; $i++) {
	$groupClient = new GroupClient();
	$groupClient->setName($i."_".rand_chars("0123456789ABCEDFG", 14));
	$entityManager->persist($groupClient);
	$entityManager->flush();
	$debug['GroupClient'][] = array($groupClient->getId(), $groupClient->getName());
}
$x = rand(1, $groupClient->getId());
$iii = $iii * 2;
for ($i = 1; $i <= $iii; $i++) {
	$Client = new Clients();
	$Client->setName(rand_chars("ABCEDFG", 14) . "-" . $x);
	$Client->setLastname("$iii-" . rand_chars("ABCEDFG", 10));
	$Client->setEmail(rand_chars("ABCEDFG", 10) . '@' . rand_chars("ABCEDFG", 5) . '.com');
	$Client->setObservations(rand_chars("ABCEDFG ", rand(20, 500)));
	$GroupClient = $entityManager->find("GroupClient", $x);
	$Client->setGroupClient($GroupClient);
	$entityManager->persist($Client);
	$entityManager->flush();
	$debug['Client'][] = array($Client->getId(), $Client->getName(), $Client->getLastname(), $x);
}
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
$jayParsedAry = array("data" => $data, "debug" => $debug);
echo json_encode($jayParsedAry);
