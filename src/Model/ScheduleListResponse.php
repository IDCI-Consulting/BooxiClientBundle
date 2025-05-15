<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ScheduleListResponse
{
    /**
     * @var array<Schedule>
     */
    private array $schedules = [];
    private ?string $cursor = null;

    public function getSchedules(): array
    {
        return $this->schedules;
    }

    public function setSchedules(array $schedules): self
    {
        $this->schedules = $schedules;

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
