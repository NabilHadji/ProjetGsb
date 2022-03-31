<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PraticiensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PraticiensRepository::class)
 * @ApiResource
 */
class Praticiens
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_rue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_codepostale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_ville;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $pra_coefnotoriote;

    /**
     * @ORM\OneToMany(targetEntity=Visites::class, mappedBy="vst_praticiens")
     */
    private $pra_visites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_praticiens;

    public function __construct()
    {
        $this->pra_visites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPraNom(): ?string
    {
        return $this->pra_nom;
    }

    public function setPraNom(?string $pra_nom): self
    {
        $this->pra_nom = $pra_nom;

        return $this;
    }

    public function getPraPrenom(): ?string
    {
        return $this->pra_prenom;
    }

    public function setPraPrenom(?string $pra_prenom): self
    {
        $this->pra_prenom = $pra_prenom;

        return $this;
    }

    public function getPraEmail(): ?string
    {
        return $this->pra_email;
    }

    public function setPraEmail(?string $pra_email): self
    {
        $this->pra_email = $pra_email;

        return $this;
    }

    public function getPraTel(): ?string
    {
        return $this->pra_tel;
    }

    public function setPraTel(?string $pra_tel): self
    {
        $this->pra_tel = $pra_tel;

        return $this;
    }

    public function getPraRue(): ?string
    {
        return $this->pra_rue;
    }

    public function setPraRue(?string $pra_rue): self
    {
        $this->pra_rue = $pra_rue;

        return $this;
    }

    public function getPraCodepostale(): ?string
    {
        return $this->pra_codepostale;
    }

    public function setPraCodepostale(?string $pra_codepostale): self
    {
        $this->pra_codepostale = $pra_codepostale;

        return $this;
    }

    public function getPraVille(): ?string
    {
        return $this->pra_ville;
    }

    public function setPraVille(?string $pra_ville): self
    {
        $this->pra_ville = $pra_ville;

        return $this;
    }

    public function getPraCoefnotoriote(): ?int
    {
        return $this->pra_coefnotoriote;
    }

    public function setPraCoefnotoriote(?int $pra_coefnotoriote): self
    {
        $this->pra_coefnotoriote = $pra_coefnotoriote;

        return $this;
    }

    /**
     * @return Collection|Visites[]
     */
    public function getPraVisites(): Collection
    {
        return $this->pra_visites;
    }

    public function addPraVisite(Visites $praVisite): self
    {
        if (!$this->pra_visites->contains($praVisite)) {
            $this->pra_visites[] = $praVisite;
            $praVisite->setVstPraticiens($this);
        }

        return $this;
    }

    public function removePraVisite(Visites $praVisite): self
    {
        if ($this->pra_visites->removeElement($praVisite)) {
            // set the owning side to null (unless already changed)
            if ($praVisite->getVstPraticiens() === $this) {
                $praVisite->setVstPraticiens(null);
            }
        }

        return $this;
    }

    public function getUserPraticiens(): ?string
    {
        return $this->user_praticiens;
    }

    public function setUserPraticiens(?string $user_praticiens): self
    {
        $this->user_praticiens = $user_praticiens;

        return $this;
    }
}
