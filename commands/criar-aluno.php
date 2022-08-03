<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// gerenciar a entidade para que ela seja persistida no banco
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno('Aluno com telefones cascade');
$aluno->addTelefone(new Telefone('(11) 999648816'))->addTelefone(new Telefone('(24) 24456617'));

// persist = coloca a entidade como observada, se em algum momento nós formos no banco, ela será adicionada
$entityManager->persist($aluno);
// Tudo que estiver de modificação depois ele vai continuar observando e vai salvar no banco quando formos efetivamente lá
// $argv[1] = valores dos argumentos, recebe os valores, a partir do índice 1, de tudo que você passar na linha de comando
// Para inserir alunos dessa forma digitamos no terminal de comando php commands\criar-aluno.php "Nome"
// $aluno->setNome($argv[1]);

// flush = quando terminamos nossas alterações e queremos salvar no banco
$entityManager->flush();