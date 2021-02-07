<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alpha2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alpha3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_en_gb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_fr_fr;

    /**
     * @ORM\OneToMany(targetEntity=Actor::class, mappedBy="country")
     */
    private $actors;

    /**
     * @ORM\OneToMany(targetEntity=Director::class, mappedBy="country")
     */
    private $directors;

    public function __construct()
    {
        $this->actors = new ArrayCollection();
        $this->actor = new ArrayCollection();
        $this->directors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    
    public function getCode(): ?int
    {
        return $this->code;
    }
    
    public function setCode(int $code): self
    {
        $this->code = $code;
        
        return $this;
    }
    
    public function getAlpha2(): ?string
    {
        return $this->alpha2;
    }
    
    public function setAlpha2(string $alpha2): self
    {
        $this->alpha2 = $alpha2;
        
        return $this;
    }
    
    public function getAlpha3(): ?string
    {
        return $this->alpha3;
    }
    
    public function setAlpha3(string $alpha3): self
    {
        $this->alpha3 = $alpha3;
        
        return $this;
    }
    
    public function getNomEnGb(): ?string
    {
        return $this->nom_en_gb;
    }
    
    public function setNomEnGb(string $nom_en_gb): self
    {
        $this->nom_en_gb = $nom_en_gb;
        
        return $this;
    }
    
    public function getNomFrFr(): ?string
    {
        return $this->nom_fr_fr;
    }
    
    public function setNomFrFr(string $nom_fr_fr): self
    {
        $this->nom_fr_fr = $nom_fr_fr;
        
        return $this;
    }

    public function __toString()
    {
        return $this->nom_fr_fr;
    }

    /**
     * @return Collection|Actor[]
     */
    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function addActor(Actor $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
            $actor->setCountry($this);
        }

        return $this;
    }

    public function removeActor(Actor $actor): self
    {
        if ($this->actors->removeElement($actor)) {
            // set the owning side to null (unless already changed)
            if ($actor->getCountry() === $this) {
                $actor->setCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Director[]
     */
    public function getDirectors(): Collection
    {
        return $this->directors;
    }

    public function addDirector(Director $director): self
    {
        if (!$this->directors->contains($director)) {
            $this->directors[] = $director;
            $director->setCountry($this);
        }

        return $this;
    }

    public function removeDirector(Director $director): self
    {
        if ($this->directors->removeElement($director)) {
            // set the owning side to null (unless already changed)
            if ($director->getCountry() === $this) {
                $director->setCountry(null);
            }
        }

        return $this;
    }
}
