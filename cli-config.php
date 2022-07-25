<?php

//Arquivo necessários parar usar comandos doctrine na linha de comando

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// arquivo de autoload
require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();

// mecanismo que pega seu EntityManagerFactory
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);