<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ReservationClient extends BookingClient
{
    private ?bool $isAttending = null;

    public function getIsAttending(): ?bool
    {
        return $this->isAttending;
    }

    public function setIsAttending(?bool $isAttending): self
    {
        $this->isAttending = $isAttending;

        return $this;
    }
}