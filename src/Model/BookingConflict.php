<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingConflict extends ErrorMessage
{
    private ?BookingError $error = null;

    public function getError(): ?BookingError
    {
        return $this->error;
    }

    public function setError(?BookingError $error): self
    {
        $this->error = $error;

        return $this;
    }
}
