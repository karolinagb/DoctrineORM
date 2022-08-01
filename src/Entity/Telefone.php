<?php

namespace Alura\Doctrine\Entity;

class Telefone
{
    private int $id;
   
    private string $numero;

    private $aluno;

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNumero() : string
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;

        return $this;
    }

    //Caso 
    public function getAluno() : Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}
