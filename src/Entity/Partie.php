<?php

namespace App\Entity;

use App\Repository\PartieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartieRepository::class)
 */
class Partie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="parties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idclient;

    /**
     * @ORM\ManyToOne(targetEntity=Horraire::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ihorraire;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idsalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIhorraire(): ?Horraire
    {
        return $this->ihorraire;
    }

    public function setIhorraire(?Horraire $ihorraire): self
    {
        $this->ihorraire = $ihorraire;

        return $this;
    }

    public function getIdsalle(): ?Salle
    {
        return $this->idsalle;
    }

    public function setIdsalle(?Salle $idsalle): self
    {
        $this->idsalle = $idsalle;

        return $this;
    }
}
