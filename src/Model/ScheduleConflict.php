<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ScheduleConflict extends ErrorMessage
{
    private ?ScheduleError $error = null;

    public function getError(): ?ScheduleError
    {
        return $this->error;
    }

    public function setError(?ScheduleError $error): self
    {
        $this->error = $error;

        return $this;
    }
}