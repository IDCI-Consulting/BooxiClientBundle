<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingResponse
{
    private ?Booking $booking = null;
    /**
     * @var array<GroupEvent>
     */
    private array $groupEvents = [];

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): self
    {
        $this->booking = $booking;

        return $this;
    }

    public function getGroupEvents(): array
    {
        return $this->groupEvents;
    }

    public function setGroupEvents(array $groupEvents): self
    {
        $this->groupEvents = $groupEvents;

        return $this;
    }
}