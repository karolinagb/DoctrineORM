<?php

//Vamos configurar o gerenciador de entidades do doctrine

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

class EntityManagerFactory
{
    //Para o doctrine conseguir mapear nossas entidades, ele precisa de um gerenciador de entidades
    //getEntityManager = vai criar e retornar um EntityManager
    public static function getEntityManager() : EntityManager
    {
        //Pegar as configurações do Setup do doctine que é uma classe que já fornece a criação dessas configurações
        //createAnnotationMetadataConfiguration = vai criar as configurações que o doctrine precisa baseado em anotações/annotations
            //Precisa do caminho onde ele vai buscar as anotações
            //[$rootDir . '/src'] = podemos ter mais de um lugar onde ele busca as anotações
                //Uma anotação no php é com /** @nomeDaAnotação */
            //true = dizer se está em modo de desenvolvimento ou não (perde performace mas me dá mais informações)
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."], true);

        $connection = [
            'driver' => 'pdo_sqlite', //driver de qual banco ele vai se comunicar
            'path' => __DIR__ . '/../../var/data/banco.slite' //onde ele vai encontar o banco
        ];


        return EntityManager::create($connection, $config);
    }
}
