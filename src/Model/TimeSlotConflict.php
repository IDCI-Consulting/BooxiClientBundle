<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class TimeSlotConflict extends ErrorMessage
{
    private ?TimeSlotError $error = null;

    public function getError(): ?TimeSlotError
    {
        return $this->error;
    }

    public function setError(?TimeSlotError $error): self
    {
        $this->error = $error;

        return $this;
    }
}