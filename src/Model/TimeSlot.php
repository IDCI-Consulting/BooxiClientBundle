<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class TimeSlot
{
    private ?int $id = null;
    private ?int $merchantId = null;
    private ?string $ownerType = null;
    private ?int $staffId = null;
    private ?TimeSlotType $type = null;
    private ?\DateTimeInterface $start = null;
    private ?\DateTimeInterface $end = null;
    private ?bool $canModify = null;
    private ?string $description = null;
    private ?string $label = null;
    private ?string $availabilityTags = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMerchantId(): ?int
    {
        return $this->merchantId;
    }

    public function setMerchantId(?int $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function getOwnerType(): ?string
    {
        return $this->ownerType;
    }

    public function setOwnerType(?string $ownerType): self
    {
        $this->ownerType = $ownerType;

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

    public function getType(): ?TimeSlotType
    {
        return $this->type;
    }

    public function setType(?TimeSlotType $type): self
    {
        $this->type = $type;

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

    public function getCanModify(): ?bool
    {
        return $this->canModify;
    }

    public function setCanModify(?bool $canModify): self
    {
        $this->canModify = $canModify;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getAvailabilityTags(): ?string
    {
        return $this->availabilityTags;
    }

    public function setAvailabilityTags(?string $availabilityTags): self
    {
        $this->availabilityTags = $availabilityTags;

        return $this;
    }
}