<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSpeciality = null;

   

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpeciality(): ?string
    {
        return $this->nomSpeciality;
    }

    
    

   
}
