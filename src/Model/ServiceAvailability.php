<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceAvailability
{
    private ?\DateTimeInterface $start = null;
    private ?\DateTimeInterface $end = null;
    private ?int $serviceId = null;
    private ?int $staffId = null;
    private ?ServiceTimeSelectionMode $timeSelectionMode = null;
    private ?int $duration = null;
    private ?Price $price = null;
    private ?string $locationText = null;
    private ?int $groupEventId = null;
    private ?int $capacity = null;
    private ?int $placesLeft = null;
    private array $metadata = [];

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

    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    public function setServiceId(?int $serviceId): self
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function getStaffId(): ?int
    {
        return $this->staffId;
    }

    public function setStaffId(?int $staffId): self
    {
        $this->staffId = $staffId;

        return $this;
    }

    public function getTimeSelectionMode(): ?ServiceTimeSelectionMode
    {
        return $this->timeSelectionMode;
    }

    public function setTimeSelectionMode(?ServiceTimeSelectionMode $timeSelectionMode): self
    {
        $this->timeSelectionMode = $timeSelectionMode;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLocationText(): ?string
    {
        return $this->locationText;
    }

    public function setLocationText(?string $locationText): self
    {
        $this->locationText = $locationText;

        return $this;
    }

    public function getGroupEventId(): ?int
    {
        return $this->groupEventId;
    }

    public function setGroupEventId(?int $groupEventId): self
    {
        $this->groupEventId = $groupEventId;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getPlacesLeft(): ?int
    {
        return $this->placesLeft;
    }

    public function setPlacesLeft(?int $placesLeft): self
    {
        $this->placesLeft = $placesLeft;

        return $this;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }
}
