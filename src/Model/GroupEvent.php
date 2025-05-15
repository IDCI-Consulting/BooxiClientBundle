<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class GroupEvent
{
    private ?int $id = null;
    private ?\DateTimeInterface $start = null;
    private ?int $duration = null;
    private ?Price $price = null;
    private ?BookingLocation $location = null;
    private ?string $locationText = null;
    private ?int $staffId = null;
    private ?string $staffName = null;
    private ?string $staffFirstName = null;
    private ?string $staffLastName = null;
    private ?BookNowStaff $staff = null;
    private ?int $serviceId = null;
    private ?string $serviceName = null;
    private ?int $serviceCategoryId = null;
    private ?string $serviceCategoryName = null;
    private ?BookNowService $service = null;
    private ?int $attendeeCount = null;
    private ?int $attendeeCapacity = null;
    private ?bool $isCompleted = null;
    private ?\DateTimeInterface $onlineBookingAllowedFrom = null;
    private ?\DateTimeInterface $onlineBookingAllowedUntil = null;
    private ?\DateTimeInterface $createdOn = null;
    private array $metadata = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

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

    public function getLocation(): ?BookingLocation
    {
        return $this->location;
    }

    public function setLocation(?BookingLocation $location): self
    {
        $this->location = $location;

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

    public function getStaffId(): ?int
    {
        return $this->staffId;
    }

    public function setStaffId(?int $staffId): self
    {
        $this->staffId = $staffId;

        return $this;
    }

    public function getStaffName(): ?string
    {
        return $this->staffName;
    }

    public function setStaffName(?string $staffName): self
    {
        $this->staffName = $staffName;

        return $this;
    }

    public function getStaffFirstName(): ?string
    {
        return $this->staffFirstName;
    }

    public function setStaffFirstName(?string $staffFirstName): self
    {
        $this->staffFirstName = $staffFirstName;

        return $this;
    }

    public function getStaffLastName(): ?string
    {
        return $this->staffLastName;
    }

    public function setStaffLastName(?string $staffLastName): self
    {
        $this->staffLastName = $staffLastName;

        return $this;
    }

    public function getStaff(): ?BookNowStaff
    {
        return $this->staff;
    }

    public function setStaff(?BookNowStaff $staff): self
    {
        $this->staff = $staff;

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

    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    public function setServiceName(?string $serviceName): self
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    public function getServiceCategoryId(): ?int
    {
        return $this->serviceCategoryId;
    }

    public function setServiceCategoryId(?int $serviceCategoryId): self
    {
        $this->serviceCategoryId = $serviceCategoryId;

        return $this;
    }

    public function getServiceCategoryName(): ?string
    {
        return $this->serviceCategoryName;
    }

    public function setServiceCategoryName(?string $serviceCategoryName): self
    {
        $this->serviceCategoryName = $serviceCategoryName;

        return $this;
    }

    public function getService(): ?BookNowService
    {
        return $this->service;
    }

    public function setService(?BookNowService $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getAttendeeCount(): ?int
    {
        return $this->attendeeCount;
    }

    public function setAttendeeCount(?int $attendeeCount): self
    {
        $this->attendeeCount = $attendeeCount;

        return $this;
    }

    public function getAttendeeCapacity(): ?int
    {
        return $this->attendeeCapacity;
    }

    public function setAttendeeCapacity(?int $attendeeCapacity): self
    {
        $this->attendeeCapacity = $attendeeCapacity;

        return $this;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(?bool $isCompleted): self
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }

    public function getOnlineBookingAllowedFrom(): ?\DateTimeInterface
    {
        return $this->onlineBookingAllowedFrom;
    }

    public function setOnlineBookingAllowedFrom(?\DateTimeInterface $onlineBookingAllowedFrom): self
    {
        $this->onlineBookingAllowedFrom = $onlineBookingAllowedFrom;

        return $this;
    }

    public function getOnlineBookingAllowedUntil(): ?\DateTimeInterface
    {
        return $this->onlineBookingAllowedUntil;
    }

    public function setOnlineBookingAllowedUntil(?\DateTimeInterface $onlineBookingAllowedUntil): self
    {
        $this->onlineBookingAllowedUntil = $onlineBookingAllowedUntil;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

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
