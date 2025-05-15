<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class TimeSlotFindResponse
{
    /**
     * @var array<TimeSlot>
     */
    private array $timeSlots = [];
    private ?string $cursor = null;

    public function getTimeSlots(): array
    {
        return $this->timeSlots;
    }

    public function setTimeSlots(array $timeSlots): self
    {
        $this->timeSlots = $timeSlots;

        return $this;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    public function setCursor(?string $cursor): self
    {
        $this->cursor = $cursor;

        return $this;
    }
}
