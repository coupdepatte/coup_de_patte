<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="article_typeanimal_FK", columns={"id_typeanimal"}), @ORM\Index(name="id_description", columns={"id_description"})})
 * @ORM\Entity(repositoryClass= "App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_article", type="string", length=100, nullable=false)
     */
    private $nomArticle;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_article", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_article", type="string", length=500, nullable=false)
     */
    private $photoArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="url_partenaire", type="string", length=500, nullable=false)
     */
    private $urlPartenaire;

    /**
     * @var \Typeanimal
     *
     * @ORM\ManyToOne(targetEntity="Typeanimal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typeanimal", referencedColumnName="id_typeanimal")
     * })
     */
    private $idTypeanimal;

    /**
     * @var \DescriptionArticle
     *
     * @ORM\ManyToOne(targetEntity="DescriptionArticle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_description", referencedColumnName="id_description")
     * })
     */
    private $idDescription;

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function getNomArticle(): ?string
    {
        return $this->nomArticle;
    }

    public function setNomArticle(string $nomArticle): self
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    public function getPrixArticle(): ?float
    {
        return $this->prixArticle;
    }

    public function setPrixArticle(float $prixArticle): self
    {
        $this->prixArticle = $prixArticle;

        return $this;
    }

    public function getPhotoArticle(): ?string
    {
        return $this->photoArticle;
    }

    public function setPhotoArticle(string $photoArticle): self
    {
        $this->photoArticle = $photoArticle;

        return $this;
    }

    public function getUrlPartenaire(): ?string
    {
        return $this->urlPartenaire;
    }

    public function setUrlPartenaire(string $urlPartenaire): self
    {
        $this->urlPartenaire = $urlPartenaire;

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

    public function getIdDescription(): ?DescriptionArticle
    {
        return $this->idDescription;
    }

    public function setIdDescription(?DescriptionArticle $idDescription): self
    {
        $this->idDescription = $idDescription;

        return $this;
    }


}
