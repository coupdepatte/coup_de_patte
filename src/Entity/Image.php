<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="image_animal_FK", columns={"id_animal"})})
 * @ORM\Entity(repositoryClass= "App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=false)
     */
    private $image;

    /**
     * @var \Animal
     *
     * @ORM\ManyToOne(targetEntity="Animal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_animal", referencedColumnName="id_animal")
     * })
     */
    private $idAnimal;

    public function getIdImage(): ?int
    {
        return $this->idImage;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdAnimal(): ?Animal
    {
        return $this->idAnimal;
    }

    public function setIdAnimal(?Animal $idAnimal): self
    {
        $this->idAnimal = $idAnimal;

        return $this;
    }


}
