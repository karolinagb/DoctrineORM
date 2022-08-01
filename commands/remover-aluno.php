<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

// require_once __DIR__ . '/../vendor/autoload.php';

// $entityManagerFactory = new EntityManagerFactory();
// $entityManager = $entityManagerFactory->getEntityManager();

// $id = $argv[1];

//Como queremos nos preocupar com a performace não vamos fazer 2 querys
// $aluno = $entityManager->find(Aluno::class, $id);

// if(is_null($aluno)){
//     echo "Aluno inexistente";
// }

//getReference = cria uma entidade que o doctrine já gerencie, mas que só tenha a informação do id passado
//pois o doctrine não vai no banco para buscar
//Se criarmos um aluno do zero sem salvar no banco, o remove não funciona porque nao e uma entidade gerenciada pelo doctrine
// $aluno = $entityManager->getReference(Aluno::class, $id);

// $entityManager->remove($aluno);

// $entityManager->flush();