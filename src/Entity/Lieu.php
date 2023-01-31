<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu", indexes={@ORM\Index(name="lieu_departement_FK", columns={"id_departement"})})
 * @ORM\Entity(repositoryClass= "App\Repository\LieuRepository")
 */
class Lieu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lieu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLieu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ville", type="string", length=15, nullable=false)
     */
    private $nomVille;

    /**
     * @var int
     *
     * @ORM\Column(name="code_ville", type="integer", nullable=false)
     */
    private $codeVille;

    /**
     * @var int
     *
     * @ORM\Column(name="code_insee", type="integer", nullable=false)
     */
    private $codeInsee;

    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departement", referencedColumnName="id_departement")
     * })
     */
    private $idDepartement;

    public function getIdLieu(): ?int
    {
        return $this->idLieu;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getCodeVille(): ?int
    {
        return $this->codeVille;
    }

    public function setCodeVille(int $codeVille): self
    {
        $this->codeVille = $codeVille;

        return $this;
    }

    public function getCodeInsee(): ?int
    {
        return $this->codeInsee;
    }

    public function setCodeInsee(int $codeInsee): self
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }

    public function getIdDepartement(): ?Departement
    {
        return $this->idDepartement;
    }

    public function setIdDepartement(?Departement $idDepartement): self
    {
        $this->idDepartement = $idDepartement;

        return $this;
    }


}
