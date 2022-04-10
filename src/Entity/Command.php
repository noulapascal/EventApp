<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'commands')]
    private $starterDish;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'commands')]
    private $mainCourse;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'guest')]
    private $dessert;

    #[ORM\ManyToOne(targetEntity: Guest::class, inversedBy: 'commands')]
    #[ORM\JoinColumn(nullable: false)]
    private $guest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarterDish(): ?Course
    {
        return $this->starterDish;
    }

    public function setStarterDish(?Course $starterDish): self
    {
        $this->starterDish = $starterDish;

        return $this;
    }

    public function getMainCourse(): ?Course
    {
        return $this->mainCourse;
    }

    public function setMainCourse(?Course $mainCourse): self
    {
        $this->mainCourse = $mainCourse;

        return $this;
    }

    public function getDessert(): ?Course
    {
        return $this->dessert;
    }

    public function setDessert(?Course $dessert): self
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getGuest(): ?Guest
    {
        return $this->guest;
    }

    public function setGuest(?Guest $guest): self
    {
        $this->guest = $guest;

        return $this;
    }
}
