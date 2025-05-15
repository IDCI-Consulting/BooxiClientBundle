<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class OpenHour
{
    private ?int $dow = null;
    private ?string $start = null;
    private ?string $end = null;

    public function getDow(): ?int
    {
        return $this->dow;
    }

    public function setDow(?int $dow): self
    {
        $this->dow = $dow;

        return $this;
    }

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(?string $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(?string $end): self
    {
        $this->end = $end;

        return $this;
    }
}
