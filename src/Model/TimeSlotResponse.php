<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class TimeSlotResponse
{
    private ?TimeSlot $timeSlot = null;

    public function getTimeSlot(): ?TimeSlot
    {
        return $this->timeSlot;
    }

    public function setTimeSlot(?TimeSlot $timeSlot): self
    {
        $this->timeSlot = $timeSlot;

        return $this;
    }
}
