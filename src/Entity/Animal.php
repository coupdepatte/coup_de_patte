<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animal
 *
 * @ORM\Table(name="animal", indexes={@ORM\Index(name="animal_couleur2_FK", columns={"id_couleur"}), @ORM\Index(name="animal_race_FK", columns={"id_race"}), @ORM\Index(name="animal_typepoils3_FK", columns={"id_typepoils"}), @ORM\Index(name="animal_statut0_FK", columns={"id_statut"}), @ORM\Index(name="animal_utilisateur4_FK", columns={"id_utilisateur"}), @ORM\Index(name="animal_taille1_FK", columns={"id_taille"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AnimalRepository")
 */
class Animal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_animal", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnimal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_animal", type="string", length=50, nullable=false)
     */
    private $nomAnimal;

    /**
     * @var float
     *
     * @ORM\Column(name="poid_animal", type="float", precision=10, scale=0, nullable=false)
     */
    private $poidAnimal;

    /**
     * @var int
     *
     * @ORM\Column(name="age_animal", type="integer", nullable=false)
     */
    private $ageAnimal;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_animal", type="string", length=500, nullable=false)
     */
    private $texteAnimal;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_animal", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixAnimal;

    /**
     * @var string
     *
     * @ORM\Column(name="lof_animal", type="string", length=250, nullable=false)
     */
    private $lofAnimal;

    /**
     * @var string
     *
     * @ORM\Column(name="is_feminin", type="string", length=250, nullable=false)
     */
    private $isFeminin;

    /**
     * @var string
     *
     * @ORM\Column(name="is_vaccine", type="string", length=250, nullable=false)
     */
    private $isVaccine;

    /**
     * @var string
     *
     * @ORM\Column(name="is_identifie", type="string", length=250, nullable=false)
     */
    private $isIdentifie;

    /**
     * @var \Race
     *
     * @ORM\ManyToOne(targetEntity="Race")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_race", referencedColumnName="id_race")
     * })
     */
    private $idRace;

    /**
     * @var \Typepoils
     *
     * @ORM\ManyToOne(targetEntity="Typepoils")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typepoils", referencedColumnName="id_typepoils")
     * })
     */
    private $idTypepoils;

    /**
     * @var \Statut
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_statut", referencedColumnName="id_statut")
     * })
     */
    private $idStatut;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \Couleur
     *
     * @ORM\ManyToOne(targetEntity="Couleur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_couleur", referencedColumnName="id_couleur")
     * })
     */
    private $idCouleur;

    /**
     * @var \Taille
     *
     * @ORM\ManyToOne(targetEntity="Taille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_taille", referencedColumnName="id_taille")
     * })
     */
    private $idTaille;

    public function getIdAnimal(): ?int
    {
        return $this->idAnimal;
    }

    public function getNomAnimal(): ?string
    {
        return $this->nomAnimal;
    }

    public function setNomAnimal(string $nomAnimal): self
    {
        $this->nomAnimal = $nomAnimal;

        return $this;
    }

    public function getPoidAnimal(): ?float
    {
        return $this->poidAnimal;
    }

    public function setPoidAnimal(float $poidAnimal): self
    {
        $this->poidAnimal = $poidAnimal;

        return $this;
    }

    public function getAgeAnimal(): ?int
    {
        return $this->ageAnimal;
    }

    public function setAgeAnimal(int $ageAnimal): self
    {
        $this->ageAnimal = $ageAnimal;

        return $this;
    }

    public function getTexteAnimal(): ?string
    {
        return $this->texteAnimal;
    }

    public function setTexteAnimal(string $texteAnimal): self
    {
        $this->texteAnimal = $texteAnimal;

        return $this;
    }

    public function getPrixAnimal(): ?float
    {
        return $this->prixAnimal;
    }

    public function setPrixAnimal(float $prixAnimal): self
    {
        $this->prixAnimal = $prixAnimal;

        return $this;
    }

    public function getLofAnimal(): ?string
    {
        return $this->lofAnimal;
    }

    public function setLofAnimal(string $lofAnimal): self
    {
        $this->lofAnimal = $lofAnimal;

        return $this;
    }

    public function getIsFeminin(): ?string
    {
        return $this->isFeminin;
    }

    public function setIsFeminin(string $isFeminin): self
    {
        $this->isFeminin = $isFeminin;

        return $this;
    }

    public function getIsVaccine(): ?string
    {
        return $this->isVaccine;
    }

    public function setIsVaccine(string $isVaccine): self
    {
        $this->isVaccine = $isVaccine;

        return $this;
    }

    public function getIsIdentifie(): ?string
    {
        return $this->isIdentifie;
    }

    public function setIsIdentifie(string $isIdentifie): self
    {
        $this->isIdentifie = $isIdentifie;

        return $this;
    }

    public function getIdRace(): ?Race
    {
        return $this->idRace;
    }

    public function setIdRace(?Race $idRace): self
    {
        $this->idRace = $idRace;

        return $this;
    }

    public function getIdTypepoils(): ?Typepoils
    {
        return $this->idTypepoils;
    }

    public function setIdTypepoils(?Typepoils $idTypepoils): self
    {
        $this->idTypepoils = $idTypepoils;

        return $this;
    }

    public function getIdStatut(): ?Statut
    {
        return $this->idStatut;
    }

    public function setIdStatut(?Statut $idStatut): self
    {
        $this->idStatut = $idStatut;

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

    public function getIdCouleur(): ?Couleur
    {
        return $this->idCouleur;
    }

    public function setIdCouleur(?Couleur $idCouleur): self
    {
        $this->idCouleur = $idCouleur;

        return $this;
    }

    public function getIdTaille(): ?Taille
    {
        return $this->idTaille;
    }

    public function setIdTaille(?Taille $idTaille): self
    {
        $this->idTaille = $idTaille;

        return $this;
    }


}
