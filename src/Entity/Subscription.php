<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
class Subscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'subscription', targetEntity: Doctor::class)]
    private String $libelle;

    #[ORM\Column]
    private ?float $tarif = null;

    public function __construct()
    {
        $this->libelle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Doctor>
     */
    public function getLibelle(): Collection
    {
        return $this->libelle;
    }

    public function addLibelle(Doctor $libelle): self
    {
        if (!$this->libelle->contains($libelle)) {
            $this->libelle->add($libelle);
            $libelle->setSubscription($this);
        }

        return $this;
    }

    public function removeLibelle(Doctor $libelle): self
    {
        if ($this->libelle->removeElement($libelle)) {
            // set the owning side to null (unless already changed)
            if ($libelle->getSubscription() === $this) {
                $libelle->setSubscription(null);
            }
        }

        return $this;
    }

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
}
