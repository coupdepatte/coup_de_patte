<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Couleur
 *
 * @ORM\Table(name="couleur")
 * @ORM\Entity(repositoryClass= "App\Repository\CouleurRepository")
 */
class Couleur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_couleur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCouleur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_couleur", type="string", length=50, nullable=false)
     */
    private $nomCouleur;

    public function getIdCouleur(): ?int
    {
        return $this->idCouleur;
    }

    public function getNomCouleur(): ?string
    {
        return $this->nomCouleur;
    }

    public function setNomCouleur(string $nomCouleur): self
    {
        $this->nomCouleur = $nomCouleur;

        return $this;
    }


}
