<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionArticle
 *
 * @ORM\Table(name="description_article")
 * @ORM\Entity(repositoryClass= "App\Repository\DescriptionArticleRepository")
 */
class DescriptionArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_description", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     */
    private $description;

    public function getIdDescription(): ?int
    {
        return $this->idDescription;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
