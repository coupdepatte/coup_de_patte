<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleveur
 *
 * @ORM\Table(name="eleveur", uniqueConstraints={@ORM\UniqueConstraint(name="eleveur_utilisateur_AK", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass= "App\Repository\EleveurRepository")
 */
class Eleveur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_eleveur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEleveur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_eleveur", type="string", length=100, nullable=false)
     */
    private $nomEleveur;

    /**
     * @var string
     *
     * @ORM\Column(name="num_siret", type="string", length=50, nullable=false)
     */
    private $numSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="facilite_payement", type="string", length=250, nullable=false)
     */
    private $facilitePayement;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdEleveur(): ?int
    {
        return $this->idEleveur;
    }

    public function getNomEleveur(): ?string
    {
        return $this->nomEleveur;
    }

    public function setNomEleveur(string $nomEleveur): self
    {
        $this->nomEleveur = $nomEleveur;

        return $this;
    }

    public function getNumSiret(): ?string
    {
        return $this->numSiret;
    }

    public function setNumSiret(string $numSiret): self
    {
        $this->numSiret = $numSiret;

        return $this;
    }

    public function getFacilitePayement(): ?string
    {
        return $this->facilitePayement;
    }

    public function setFacilitePayement(string $facilitePayement): self
    {
        $this->facilitePayement = $facilitePayement;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
