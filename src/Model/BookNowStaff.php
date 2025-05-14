<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookNowStaff
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $position = null;
    private ?string $biography = null;
    private ?string $profileImageUrl = null;
    private ?StaffTimeSelectionMode $timeSelectionMode = null;

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getProfileImageUrl(): ?string
    {
        return $this->profileImageUrl;
    }

    public function setProfileImageUrl(?string $profileImageUrl): self
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    public function getTimeSelectionMode(): ?StaffTimeSelectionMode
    {
        return $this->timeSelectionMode;
    }

    public function setTimeSelectionMode(?StaffTimeSelectionMode $timeSelectionMode): self
    {
        $this->timeSelectionMode = $timeSelectionMode;

        return $this;
    }
}
