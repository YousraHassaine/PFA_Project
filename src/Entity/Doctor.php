<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor extends User
{
    

    #[ORM\Column]
    private ?bool $disponibilite = null;

    #[ORM\ManyToOne(inversedBy: 'doctors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subscription $subscription = null;

    #[ORM\ManyToOne(inversedBy: 'Doctors')]
    private ?Speciality $specialty = null;


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

    public function setSpecialty(?speciality $specialty): self
    {
        $this->specialty = $specialty;

        return $this;
    }

}
