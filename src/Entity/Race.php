<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\Table(name="race", indexes={@ORM\Index(name="race_typeanimal_FK", columns={"id_typeanimal"})})
 * @ORM\Entity(repositoryClass= "App\Repository\RaceRepository")
 */
class Race
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_race", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRace;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_race", type="string", length=50, nullable=false)
     */
    private $nomRace;

    /**
     * @var \Typeanimal
     *
     * @ORM\ManyToOne(targetEntity="Typeanimal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typeanimal", referencedColumnName="id_typeanimal")
     * })
     */
    private $idTypeanimal;

    public function getIdRace(): ?int
    {
        return $this->idRace;
    }

    public function getNomRace(): ?string
    {
        return $this->nomRace;
    }

    public function setNomRace(string $nomRace): self
    {
        $this->nomRace = $nomRace;

        return $this;
    }

    public function getIdTypeanimal(): ?Typeanimal
    {
        return $this->idTypeanimal;
    }

    public function setIdTypeanimal(?Typeanimal $idTypeanimal): self
    {
        $this->idTypeanimal = $idTypeanimal;

        return $this;
    }


}
