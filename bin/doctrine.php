#!/usr/bin/env php
<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once __DIR__ . '../../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = EntityManagerFactory::getEntityManager();

// $commands = [
//     // If you want to add your own custom console commands,
//     // you can do so here.
// ];

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);