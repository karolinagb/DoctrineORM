<?php

namespace Alura\Doctrine\Entity;

//Dizendo que a classe é uma entidade para o doctrine
/**
 * @Entity
 */
class Aluno
{
    //Dizendo que o atributo id é um identificador único no banco
    //GeneratedValue = valor que vai ser gerado sozinho
    //@Column(type="integer") = passando o tipo do dado

    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;
    /**
     * @Column(type="string")
     */
    private string $nome;

    public function getId() : int
    {
        return $this->id;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    //Quando ele retornar uma instância para o próprio objeto, colocamos q ele retorna self
    public function setNome(string $nome) : self
    {
        $this->nome = $nome;
        //Isso server para quando eu definir o nome eu já conseguir chamar outro método dessa classe
        //$aluno = new Aluno();
        //$aluno->setNome('Teste')->getId();

        return $this;
    }
}
