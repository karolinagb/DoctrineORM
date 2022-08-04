<?php

namespace Alura\Doctrine\Entity;

use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Curso
{
    #[Id, GeneratedValue, Column]
    public int $id;
    
    #[ManyToMany(targetEntity: Aluno::class, mappedBy: "cursos")]
    private Collection $alunos;

    public function __construct(
        #[Column]
        public readonly string $nome
    )
    {
        $this->alunos = new ArrayCollection();
    }

    /**
     * @return Collection<Aluno>
     */
    public function alunos(): Collection
    {
        return $this->alunos;
    }

    public function addAluno(Aluno $aluno): void
    {
        if(!$this->alunos->contains($aluno)){
            $this->alunos->add($aluno);
            $aluno->matricularEmCurso($this);
        }
    }
}
