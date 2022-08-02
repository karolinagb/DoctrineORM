<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('Telefones')]
class Telefone
{
    #[Id, GeneratedValue, Column] //Podemos agrupar atributos
    public int $id;

    //1-N é um relacionamento bidirecional
        //Se não informamos isso nas duas entidades teríamos que criar uma tabela intermediária "AlunosTelefone"
        //Se não informarmos que é bidirecionao doctrine não entende que quando salvar um telefone tem que salvar o idAluno
        //inversedBy = diz que esse relacionamento tb existe na outra classe (isso é possível se informarmos mappedBy na outra) - opcional
            //ajuda a deixar o mapeamento mais otimizado, mas é opcional - evita erros de lade loading
    #[ManyToOne(targetEntity: Aluno::class, inversedBy: "telefones")]
    public readonly Aluno $aluno;

    public function __construct(
        #[Column]
        public readonly string $numero)
    {
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}
