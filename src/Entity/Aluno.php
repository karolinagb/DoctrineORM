<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

//Dizendo que a classe é uma entidade para o doctrine
#[Entity]
class Aluno
{
    //Dizendo que o atributo id é um identificador único no banco
    //GeneratedValue = valor que vai ser gerado sozinho
    //@Column(type="integer") = passando o tipo do dado
    #[Id]
    #[GeneratedValue]
    #[Column]
    public readonly int $id;

    //Definindo que esse campo de telefone é uma relação de 1-N entre aluno-telefone
    //targetEntity = informa a qual entidade essa relação está ligada
    //mappedBy campo que mapeia o relacionamento em Telefone
    private $telefones;

    //atualização do php 8
        //promoção de propriedades
        //crio ela e elas já são inicializadas
    public function __construct(
        //nao preciso informar o tipo da column pq a propriedade ja tem tipo
        #[Column]
        public string $nome)
    {
        //O doctrine oferece uma biblioteca de coleções
        //$this->telefones = new ArrayCollection();
    }

    // public function getId() : int
    // {
    //     return $this->id;
    // }

    // public function getNome() : string
    // {
    //     return $this->nome;
    // }

    //Quando ele retornar uma instância para o próprio objeto, colocamos q ele retorna self
    // public function setNome(string $nome) : self
    // {
    //     $this->nome = $nome;
    //     //Isso server para quando eu definir o nome eu já conseguir chamar outro método dessa classe
    //     //$aluno = new Aluno();
    //     //$aluno->setNome('Teste')->getId();

    //     return $this;
    // }

    // public function addTelefone(Telefone $telefone): self
    // {
    //     $this->telefones->add($telefone);

    //     //definindo o relacionamento do telefone com esse aluno atual
    //     $telefone->setAluno($this);

    //     //Dessa forma consigo adicionar telefones de forma encadeada
    //     return $this;
    // }

    // //Esse método não retorna um array collection porque quando os dados vierem do banco e eu já tiver telefones cadastrados
    // //que foram buscados pelo doctrine ele retorna outro tipo de coleção
    // //ArrayCollection implementa Collection que é qualquer coleção, então colocamos isso para aceitar qualquer que retornar
    // public function getTelefones(): Collection
    // {
    //     return $this->telefones;
    // }
}
