<?php

namespace App\Entity;

use App\Repository\EnrollmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnrollmentRepository::class)]
class Enrollment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'enrollments')]
    private ?course $course = null;

    #[ORM\ManyToOne(inversedBy: 'enrollments')]
    private ?student $student = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourse(): ?course
    {
        return $this->course;
    }

    public function setCourse(?course $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getStudent(): ?student
    {
        return $this->student;
    }

    public function setStudent(?student $student): static
    {
        $this->student = $student;

        return $this;
    }
}
