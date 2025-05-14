<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class CalendarEvent
{
    private ?int $id = null;
    private ?int $merchantId = null;
    private ?int $staffId = null;
    private ?\DateTimeInterface $start = null;
    private ?\DateTimeInterface $end = null;
    private ?CalendarEventType $type = null;
    private ?string $bookingId = null;
    private ?int $groupEventId = null;
    private ?int $timeSlotId = null;

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

    public function getStaffId(): ?int
    {
        return $this->staffId;
    }

    public function setStaffId(?int $staffId): self
    {
        $this->staffId = $staffId;

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

    public function getType(): ?CalendarEventType
    {
        return $this->type;
    }

    public function setType(?CalendarEventType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    public function setBookingId(?string $bookingId): self
    {
        $this->bookingId = $bookingId;

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

    public function getTimeSlotId(): ?int
    {
        return $this->timeSlotId;
    }

    public function setTimeSlotId(?int $timeSlotId): self
    {
        $this->timeSlotId = $timeSlotId;

        return $this;
    }
}
