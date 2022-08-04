<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoId = $argv[1];
$cursoId = $argv[2];

/**
 * @var Aluno $aluno */
$aluno = $entityManager->find(Aluno::class, $alunoId);

/**
 * @var Curso $curso */
$curso = $entityManager->find(Curso::class, $cursoId);

$aluno->matricularEmCurso($curso);

$entityManager->flush();
