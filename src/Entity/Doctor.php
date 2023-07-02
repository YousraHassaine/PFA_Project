<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor extends User
{
    #[ORM\Column]
    private ?bool $disponibilite = null;

    #[ORM\ManyToOne(targetEntity: Subscription::class)]
    #[ORM\JoinColumn(name: "subscription_id",referencedColumnName: "id")]

    private ?Subscription $subscription = null;
    //private ?int $subscription_id;

    #[ORM\ManyToOne(targetEntity: Speciality::class)]
    #[ORM\JoinColumn(name: "specialty_id",referencedColumnName: "id")]
    private ?Speciality $specialty = null;

    //private ?int $specialty_id;
    #[ORM\OneToOne(mappedBy: 'Doctor', cascade: ['persist', 'remove'])]
    private ?Infos $infos = null;


    public function isDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    public function getSpecialty(): ?speciality
    {
        return $this->specialty;
    }

    public function setSpecialty(?Speciality $specialty): self
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function setSpecialtyId(?int $id): self
    {
        $this->specialty_id = $id;
        return $this;
    }

    public function setSubscriptionId(?int $id): self
    {
        $this->subscription_id = $id;

        return $this;
    }

    public function getInfos(): ?Infos
    {
        return $this->infos;
    }

    public function setInfos(?Infos $infos): static
    {
        // unset the owning side of the relation if necessary
        if ($infos === null && $this->infos !== null) {
            $this->infos->setDoctor(null);
        }

        // set the owning side of the relation if necessary
        if ($infos !== null && $infos->getDoctor() !== $this) {
            $infos->setDoctor($this);
        }

        $this->infos = $infos;

        return $this;
    }

}
