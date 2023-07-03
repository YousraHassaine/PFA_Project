<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\ManyToOne(inversedBy: 'appointment')]
    private ?TypeRdv $typeRdv = null;

    #[ORM\OneToMany(mappedBy: 'appointment', targetEntity: Patient::class)]
    private Collection $Patient;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?Doctor $Doctor = null;

    public function __construct()
    {
        $this->Patient = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getTypeRdv(): ?TypeRdv
    {
        return $this->typeRdv;
    }

    public function setTypeRdv(?TypeRdv $typeRdv): self
    {
        $this->typeRdv = $typeRdv;

        return $this;
    }

    /**
     * @return Collection<int, Patient>
     */
    public function getPatient(): Collection
    {
        return $this->Patient;
    }

    public function addPatient(Patient $patient): static
    {
        if (!$this->Patient->contains($patient)) {
            $this->Patient->add($patient);
            $patient->setAppointment($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): static
    {
        if ($this->Patient->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getAppointment() === $this) {
                $patient->setAppointment(null);
            }
        }

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->Doctor;
    }

    public function setDoctor(?Doctor $Doctor): static
    {
        $this->Doctor = $Doctor;

        return $this;
    }

    
}
