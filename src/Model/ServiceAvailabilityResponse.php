<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceAvailabilityResponse
{
    private ?ServiceStaffSelectionMode $staffSelectionMode = null;
    private ?ServiceTimeSelectionMode $timeSelectionMode = null;
    /**
     * @var array<ServiceAvailability>
     */
    private array $serviceAvailability = [];
    private ?string $cursor = null;

    public function getStaffSelectionMode(): ?ServiceStaffSelectionMode
    {
        return $this->staffSelectionMode;
    }

    public function setStaffSelectionMode(?ServiceStaffSelectionMode $staffSelectionMode): self
    {
        $this->staffSelectionMode = $staffSelectionMode;

        return $this;
    }

    public function getTimeSelectionMode(): ?ServiceTimeSelectionMode
    {
        return $this->timeSelectionMode;
    }

    public function setTimeSelectionMode(?ServiceTimeSelectionMode $timeSelectionMode): self
    {
        $this->timeSelectionMode = $timeSelectionMode;

        return $this;
    }

    public function getServiceAvailability(): array
    {
        return $this->serviceAvailability;
    }

    public function setServiceAvailability(array $serviceAvailability): self
    {
        $this->serviceAvailability = $serviceAvailability;

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