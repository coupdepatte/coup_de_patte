<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taille
 *
 * @ORM\Table(name="taille")
 * @ORM\Entity(repositoryClass= "App\Repository\TailleRepository")
 */
class Taille
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_taille", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTaille;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_taille", type="string", length=10, nullable=false)
     */
    private $nomTaille;

    public function getIdTaille(): ?int
    {
        return $this->idTaille;
    }

    public function getNomTaille(): ?string
    {
        return $this->nomTaille;
    }

    public function setNomTaille(string $nomTaille): self
    {
        $this->nomTaille = $nomTaille;

        return $this;
    }


}
