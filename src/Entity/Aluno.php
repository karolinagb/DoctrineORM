<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToOne;
use Alura\Doctrine\Entity\Telefone;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;
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
    #[Id, GeneratedValue, Column]
    public int $id;
  
    //iterable = qualquer coisa q eu consiga fazer foreach
    //#[OneToMany] = relacionamento 1 -N
        //targetEntity = com quem está se relacionando
        //mappedBy = diz que esse relacionamento 1 aluno para N telefones está sendo mapeado pela propriedade aluno da classe Telefone
        //cascade = define que alguma operação vai ser realizada em cascata, ou seja, quando for realizada em aluno, vai ser realizada em telefone
    #[OneToMany(targetEntity: Telefone::class, mappedBy: "aluno", cascade:["persist", "remove"])]
    // private iterable $telefones;
        //posso colocar como readonly pois não estamos modificando telefones, mas chamando o método add desse objeto
    private Collection $telefones;

    #[ManyToMany(targetEntity: Curso::class, inversedBy: "alunos")]
    private Collection $cursos;

    //atualização do php 8
        //promoção de propriedades
        //crio ela e elas já são inicializadas
    public function __construct(
        //nao preciso informar o tipo da column pq a propriedade ja tem tipo
        #[Column]
        public readonly string $nome)
    {
        //Sempre que tivermos 1-N ou N-N essa associação para muitos precisa ser inicializada com uma coleção do doctrine
        //O doctrine oferece uma biblioteca de coleções
        //obs: quando adiciono os telefones ele deixa de ser arrayCollection e passa a ser outra coleção do
            //doctrine já armazenada no banco, então devido essa alteração automática na hora de persistir,
            //essa propriedade não pode ser readonly
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);

        //adicionando o aluno atual a esse telefone
        $telefone->setAluno($this);

        //Dessa forma consigo adicionar telefones de forma encadeada
        return $this;
    }

    // //Esse método não retorna um array collection porque quando os dados vierem do banco e eu já tiver telefones cadastrados
    // //que foram buscados pelo doctrine ele retorna outro tipo de coleção
    // //ArrayCollection implementa Collection que é qualquer coleção, então colocamos isso para aceitar qualquer que retornar
    /**
     * @return Collection<Telefone> */
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    /**
     * @return Collection<Curso> */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function matricularEmCurso(Curso $curso): void
    {
         //Para resolver problema de recurssão infinita
        if(!$this->cursos->contains($curso)){
            $this->cursos->add($curso);
            $curso->addAluno($this);
        }
    }
}
