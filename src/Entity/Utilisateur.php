<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="utilisateur_lieu_FK", columns={"id_lieu"}), @ORM\Index(name="utilisateur_role0_FK", columns={"id_role"})})
 * @ORM\Entity(repositoryClass= "App\Repository\UtilisateurRepository")
 */

#[UniqueEntity(
    fields: ['login_utilisateur'],
    errorPath: 'login_utilisateur',
    message: 'Cet email semble déjà être utilisé, veuillez en choisir une autre.'
    )]

class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface, PasswordHasherAwareInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_utilisateur", type="string", length=50, nullable=false)
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_utilisateur", type="string", length=50, nullable=false)
     */
    private $prenomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo_utilisateur", type="string", length=250, nullable=false)
     */
    private $pseudoUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="login_utilisateur", type="string", length=25, nullable=false)
     */
    private $loginUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_utilisateur", type="string", length=500, nullable=false)
     */
    private $mdpUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="adressse", type="string", length=250, nullable=false)
     */
    private $adressse;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude_adresse", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitudeAdresse;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude_adresse", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitudeAdresse;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_role")
     * })
     */
    private $idRole;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lieu", referencedColumnName="id_lieu")
     * })
     */
    private $idLieu;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    public function getPseudoUtilisateur(): ?string
    {
        return $this->pseudoUtilisateur;
    }

    public function setPseudoUtilisateur(string $pseudoUtilisateur): self
    {
        $this->pseudoUtilisateur = $pseudoUtilisateur;

        return $this;
    }

    public function getLoginUtilisateur(): ?string
    {
        return $this->loginUtilisateur;
    }

    public function setLoginUtilisateur(string $loginUtilisateur): self
    {
        $this->loginUtilisateur = $loginUtilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur(string $mdpUtilisateur): self
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    public function getAdressse(): ?string
    {
        return $this->adressse;
    }

    public function setAdressse(string $adressse): self
    {
        $this->adressse = $adressse;

        return $this;
    }

    public function getLongitudeAdresse(): ?float
    {
        return $this->longitudeAdresse;
    }

    public function setLongitudeAdresse(float $longitudeAdresse): self
    {
        $this->longitudeAdresse = $longitudeAdresse;

        return $this;
    }

    public function getLatitudeAdresse(): ?float
    {
        return $this->latitudeAdresse;
    }

    public function setLatitudeAdresse(float $latitudeAdresse): self
    {
        $this->latitudeAdresse = $latitudeAdresse;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }

    public function getIdLieu(): ?Lieu
    {
        return $this->idLieu;
    }

    public function setIdLieu(?Lieu $idLieu): self
    {
        $this->idLieu = $idLieu;

        return $this;
    }

       //--------- UserInterface

    /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->loginUtilisateur;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {        
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    /**
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->mdpUtilisateur;
    }

    public function getPasswordHasherName(): ?string
    {
        return null;
    }

}

