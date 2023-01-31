<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typepoils
 *
 * @ORM\Table(name="typepoils")
 * @ORM\Entity(repositoryClass= "App\Repository\TypepoilsRepository")
 */
class Typepoils
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_typepoils", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypepoils;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_typepoils", type="string", length=15, nullable=false)
     */
    private $nomTypepoils;

    public function getIdTypepoils(): ?int
    {
        return $this->idTypepoils;
    }

    public function getNomTypepoils(): ?string
    {
        return $this->nomTypepoils;
    }

    public function setNomTypepoils(string $nomTypepoils): self
    {
        $this->nomTypepoils = $nomTypepoils;

        return $this;
    }


}
