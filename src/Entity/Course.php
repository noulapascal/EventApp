<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'courses')]
    private $event;

    #[ORM\ManyToOne(targetEntity: CourseType::class, inversedBy: 'courses')]
    private $type;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $availability;

    #[ORM\OneToMany(mappedBy: 'starterDish', targetEntity: Command::class)]
    private $commands;

    #[ORM\OneToMany(mappedBy: 'dessert', targetEntity: Command::class)]
    private $guest;

    public function __construct()
    {
        $this->commands = new ArrayCollection();
        $this->guest = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getType(): ?CourseType
    {
        return $this->type;
    }

    public function setType(?CourseType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(?bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return Collection<int, Command>
     */
    public function getCommands(): Collection
    {
        return $this->commands;
    }

    public function addCommand(Command $command): self
    {
        if (!$this->commands->contains($command)) {
            $this->commands[] = $command;
            $command->setStarterDish($this);
        }

        return $this;
    }

    public function removeCommand(Command $command): self
    {
        if ($this->commands->removeElement($command)) {
            // set the owning side to null (unless already changed)
            if ($command->getStarterDish() === $this) {
                $command->setStarterDish(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Command>
     */
    public function getGuest(): Collection
    {
        return $this->guest;
    }

    public function addGuest(Command $guest): self
    {
        if (!$this->guest->contains($guest)) {
            $this->guest[] = $guest;
            $guest->setDessert($this);
        }

        return $this;
    }

    public function removeGuest(Command $guest): self
    {
        if ($this->guest->removeElement($guest)) {
            // set the owning side to null (unless already changed)
            if ($guest->getDessert() === $this) {
                $guest->setDessert(null);
            }
        }

        return $this;
    }

}
