<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codePostal;

    /**
     * @ORM\OneToMany(targetEntity=Salle::class, mappedBy="idsite", cascade={"persist"})
     */
    private $salles;

    /**
     * @ORM\ManyToMany(targetEntity=Horraire::class, inversedBy="sites")
     */
    private $horraires;

    public function __construct()
    {
        $this->salles = new ArrayCollection();
        $this->horraires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setIdsite($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->removeElement($salle)) {
            // set the owning side to null (unless already changed)
            if ($salle->getIdsite() === $this) {
                $salle->setIdsite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Horraire[]
     */
    public function getHorraires(): Collection
    {
        return $this->horraires;
    }

    public function addHorraire(Horraire $horraire): self
    {
        if (!$this->horraires->contains($horraire)) {
            $this->horraires[] = $horraire;
        }

        return $this;
    }

    public function removeHorraire(Horraire $horraire): self
    {
        $this->horraires->removeElement($horraire);

        return $this;
    }
    public function __toString()
    {
        return $this->getVille()." ".$this->getAdresse();
        // TODO: Implement __toString() method.
    }
}
