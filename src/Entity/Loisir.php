<?php

namespace App\Entity;

use App\Repository\LoisirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoisirRepository::class)
 */
class Loisir
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
    private $nomLoisir;

    /**
     * @ORM\ManyToOne(targetEntity=TypeLoisir::class, inversedBy="loisirs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeLoisir;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLoisir(): ?string
    {
        return $this->nomLoisir;
    }

    public function setNomLoisir(string $nomLoisir): self
    {
        $this->nomLoisir = $nomLoisir;

        return $this;
    }

    public function getTypeLoisir(): ?TypeLoisir
    {
        return $this->typeLoisir;
    }

    public function setTypeLoisir(?TypeLoisir $typeLoisir): self
    {
        $this->typeLoisir = $typeLoisir;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

}
