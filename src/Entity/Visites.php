<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VisitesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisitesRepository::class)
 * @ApiResource
 */
class Visites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $vst_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $vst_commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Praticiens::class, inversedBy="pra_visites")
     */
    private $vst_praticiens;

    /**
     * @ORM\ManyToOne(targetEntity=Motif::class, inversedBy="mot_visites")
     */
    private $vst_motif;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vst_user")
     */
    private $vst_visiteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVstDate(): ?\DateTimeInterface
    {
        return $this->vst_date;
    }

    public function setVstDate(?\DateTimeInterface $vst_date): self
    {
        $this->vst_date = $vst_date;

        return $this;
    }

    public function getVstCommentaire(): ?string
    {
        return $this->vst_commentaire;
    }

    public function setVstCommentaire(?string $vst_commentaire): self
    {
        $this->vst_commentaire = $vst_commentaire;

        return $this;
    }

    public function getVstPraticiens(): ?praticiens
    {
        return $this->vst_praticiens;
    }

    public function setVstPraticiens(?praticiens $vst_praticiens): self
    {
        $this->vst_praticiens = $vst_praticiens;

        return $this;
    }

    public function getVstMotif(): ?motif
    {
        return $this->vst_motif;
    }

    public function setVstMotif(?motif $vst_motif): self
    {
        $this->vst_motif = $vst_motif;

        return $this;
    }

    public function getVstVisiteur(): ?user
    {
        return $this->vst_visiteur;
    }

    public function setVstVisiteur(?user $vst_visiteur): self
    {
        $this->vst_visiteur = $vst_visiteur;

        return $this;
    }
}
