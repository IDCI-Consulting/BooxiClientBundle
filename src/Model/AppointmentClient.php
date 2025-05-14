<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class AppointmentClient extends BookingClient
{
    private ?Address $address = null;

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}