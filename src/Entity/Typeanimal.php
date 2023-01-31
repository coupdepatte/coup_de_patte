<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeanimal
 *
 * @ORM\Table(name="typeanimal")
 * @ORM\Entity(repositoryClass= "App\Repository\TypeanimalRepository")
 */
class Typeanimal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_typeanimal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_type", type="string", length=15, nullable=false)
     */
    private $nomType;

    public function getIdTypeanimal(): ?int
    {
        return $this->idTypeanimal;
    }

    public function getNomType(): ?string
    {
        return $this->nomType;
    }

    public function setNomType(string $nomType): self
    {
        $this->nomType = $nomType;

        return $this;
    }


}
