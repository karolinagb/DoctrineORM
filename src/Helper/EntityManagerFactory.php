<?php

//Vamos configurar o gerenciador de entidades do doctrine

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerFactory
{
    //Para o doctrine conseguir mapear nossas entidades, ele precisa de um gerenciador de entidades
    //getEntityManager = vai criar e retornar um EntityManager
    public function getEntityManager() : EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';

        //Pegar as configurações do Setup do doctine que é uma classe que já fornece a criação dessas configurações
        //createAnnotationMetadataConfiguration = vai criar as configurações que o doctrine precisa baseado em anotações/annotations
            //Precisa do caminho onde ele vai buscar as anotações
            //[$rootDir . '/src'] = podemos ter mais de um lugar onde ele busca as anotações
                //Uma anotação no php é com /** @nomeDaAnotação */
            //true = dizer se está em modo de desenvolvimento ou não (perde performace mas me dá mais informações)
        $config = Setup::createAnnotationMetadataConfiguration([$rootDir . '/src'], true);

        $connection = [
            'driver' => 'pdo_sqlite', //driver de qual banco ele vai se comunicar
            'path' => $rootDir . '/var/data/banco.slite' //onde ele vai encontar o banco
        ];


        return EntityManager::create($connection, $config);
    }
}
