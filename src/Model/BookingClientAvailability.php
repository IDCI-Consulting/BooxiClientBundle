<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingClientAvailability
{
    private ?\DateTimeInterface $from = null;
    private ?\DateTimeInterface $to = null;

    public function getFrom(): ?\DateTimeInterface
    {
        return $this->from;
    }

    public function setFrom(?\DateTimeInterface $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): ?\DateTimeInterface
    {
        return $this->to;
    }

    public function setTo(?\DateTimeInterface $to): self
    {
        $this->to = $to;

        return $this;
    }
}
