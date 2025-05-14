<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Schedule
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?\DateTimeInterface $start = null;
    private ?\DateTimeInterface $end = null;
    /**
     * @var array<OpenHour>
     */
    private array $weeklyHours = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
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

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getWeeklyHours(): array
    {
        return $this->weeklyHours;
    }

    public function setWeeklyHour(array $weeklyHours): self
    {
        $this->weeklyHours = $weeklyHours;

        return $this;
    }
}
