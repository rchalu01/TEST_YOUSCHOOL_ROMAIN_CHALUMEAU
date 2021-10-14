<?php

namespace App\Entity;

use App\Repository\TypeLoisirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeLoisirRepository::class)
 */
class TypeLoisir
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
    private $nomTypeLoisir;

    /**
     * @ORM\OneToMany(targetEntity=Loisir::class, mappedBy="typeLoisir", orphanRemoval=true)
     */
    private $loisirs;

    public function __construct()
    {
        $this->loisirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeLoisir(): ?string
    {
        return $this->nomTypeLoisir;
    }

    public function setNomTypeLoisir(string $nomTypeLoisir): self
    {
        $this->nomTypeLoisir = $nomTypeLoisir;

        return $this;
    }

    /**
     * @return Collection|Loisir[]
     */
    public function getLoisirs(): Collection
    {
        return $this->loisirs;
    }

    public function addLoisir(Loisir $loisir): self
    {
        if (!$this->loisirs->contains($loisir)) {
            $this->loisirs[] = $loisir;
            $loisir->setTypeLoisir($this);
        }

        return $this;
    }

    public function removeLoisir(Loisir $loisir): self
    {
        if ($this->loisirs->removeElement($loisir)) {
            // set the owning side to null (unless already changed)
            if ($loisir->getTypeLoisir() === $this) {
                $loisir->setTypeLoisir(null);
            }
        }

        return $this;
    }
}
