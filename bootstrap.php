<?php

require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'vendor', 'autoload.php']);
require_once "model/base_config.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Tuto\Entity\Contact;


$entitiesPath = [
    join(DIRECTORY_SEPARATOR, [__DIR__, "src", "Entity"])
];

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

// Connexion à la base de données
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => $dbhost,
    'charset'  => 'utf8',
    'user'     => $dbuser,
    'password' => $dbpass,
    'dbname'   => $dbname,
];

$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;