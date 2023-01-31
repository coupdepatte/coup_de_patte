<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass= "App\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_departement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_departement", type="string", length=50, nullable=false)
     */
    private $nomDepartement;

    public function getIdDepartement(): ?int
    {
        return $this->idDepartement;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nomDepartement;
    }

    public function setNomDepartement(string $nomDepartement): self
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }


}
