<?php
use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotation Mapping
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

$conn = array(
    'driver' => 'pdo_mysql',
    'host' => 'mysql8',
    'dbname' => 'abmClient',
    'user' => 'abmClient',
    'password' => '3x4mpl3'
);
// obtaining the entity manager
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

