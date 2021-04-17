<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="salles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idsite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdsite(): ?Site
    {
        return $this->idsite;
    }

    public function setIdsite(?Site $idsite): self
    {
        $this->idsite = $idsite;

        return $this;
    }
    public function __toString()
    {
        return $this->getIdsite()->getVille()." salle ".$this->getId();
        // TODO: Implement __toString() method.
    }
}
