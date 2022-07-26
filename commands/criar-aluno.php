<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno->setNome('Karolina Bento');

//gerenciar a entidade para que ela seja persistida no banco
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//persist = coloca a entidade como observada, se em algum momento nós formos no banco, ela será adicionada
$entityManager->persist($aluno);
//Tudo que estiver de modificação depois ele vai continuar observando e vai salvar no banco quando formos efetivamente lá
$aluno->setNome('Karolina Gomes Bento');

//flush = quando terminamos nossas alterações e queremos salvar no banco
$entityManager->flush();