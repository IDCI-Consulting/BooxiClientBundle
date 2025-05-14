<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Booking
{
    protected ?string $bookingId = null;
    protected ?int $merchantId = null;
    protected ?BookingMethod $bookingMethod = null;
    protected ?BookingStatus $status = null;
    protected ?bool $isCompleted = null;
    protected ?\DateTimeInterface $startsOn = null;
    protected ?Timespan $totalClientTimespan = null;
    protected ?int $staffId = null;
    protected ?string $staffFirstName = null;
    protected ?string $staffLastName = null;
    /**
     * @var array<BookingItem>
     */
    protected array $items = [];
    protected ?BookingLocation $location = null;
    protected ?string $locationText = null;
    protected ?BookingPayment $payment = null;
    protected ?\DateTimeInterface $createdOn = null;
    protected ?ModificationSource $createdBy = null;
    protected ?int $createdByStaffId = null;
    protected ?\DateTimeInterface $modifiedOn = null;
    protected ?ModificationSource $modifiedBy = null;
    protected ?int $modifiedByStaffId = null;
    protected ?string $acquisitionChannel = null;

    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    public function setBookingId(?string $bookingId): self
    {
        $this->bookingId = $bookingId;

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

    public function getBookingMethod(): ?BookingMethod
    {
        return $this->bookingMethod;
    }

    public function setBookingMethod(?BookingMethod $bookingMethod): self
    {
        $this->bookingMethod = $bookingMethod;

        return $this;
    }

    public function getStatus(): ?BookingStatus
    {
        return $this->status;
    }

    public function setStatus(?BookingStatus $status): self
    {
        $this->status = $status;

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

    public function getStartsOn(): ?\DateTimeInterface
    {
        return $this->startsOn;
    }

    public function setStartsOn(?\DateTimeInterface $startsOn): self
    {
        $this->startsOn = $startsOn;

        return $this;
    }

    public function getTotalClientTimespan(): ?Timespan
    {
        return $this->totalClientTimespan;
    }

    public function setTotalClientTimespan(?Timespan $totalClientTimespan): self
    {
        $this->totalClientTimespan = $totalClientTimespan;

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

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): self
    {
        $this->items = $items;

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

    public function getPayment(): ?BookingPayment
    {
        return $this->payment;
    }

    public function setPayment(?BookingPayment $payment): self
    {
        $this->payment = $payment;

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

    public function getCreatedBy(): ?ModificationSource
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?ModificationSource $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getCreatedByStaffId(): ?int
    {
        return $this->createdByStaffId;
    }

    public function setCreatedByStaffId(?int $createdByStaffId): self
    {
        $this->createdByStaffId = $createdByStaffId;

        return $this;
    }

    public function getModifiedOn(): ?\DateTimeInterface
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(?\DateTimeInterface $modifiedOn): self
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    public function getModifiedBy(): ?ModificationSource
    {
        return $this->modifiedBy;
    }

    public function setModifiedBy(?ModificationSource $modifiedBy): self
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    public function getModifiedByStaffId(): ?int
    {
        return $this->modifiedByStaffId;
    }

    public function setModifiedByStaffId(?int $modifiedByStaffId): self
    {
        $this->modifiedByStaffId = $modifiedByStaffId;

        return $this;
    }

    public function getAcquisitionChannel(): ?string
    {
        return $this->acquisitionChannel;
    }

    public function setAcquisitionChannel(?string $acquisitionChannel): self
    {
        $this->acquisitionChannel = $acquisitionChannel;

        return $this;
    }
}