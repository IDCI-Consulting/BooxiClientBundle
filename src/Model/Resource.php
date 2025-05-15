<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Resource
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?ResourceStatus $status = null;

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

    public function getStatus(): ?ResourceStatus
    {
        return $this->status;
    }

    public function setStatus(?ResourceStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}
