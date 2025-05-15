<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class MerchantAvailabilityResponse
{
    private ?ServiceAvailability $serviceAvailability = null;
    /**
     * @var array<BookNowService>
     */
    private array $services = [];
    private ?BookNowStaff $staff = null;
    /**
     * @var array<BookNowMerchant>
     */
    private array $merchants = [];
    private ?string $cursor = null;

    public function getServiceAvailability(): ?ServiceAvailability
    {
        return $this->serviceAvailability;
    }

    public function setServiceAvailability(?ServiceAvailability $serviceAvailability): self
    {
        $this->serviceAvailability = $serviceAvailability;

        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function setServices(array $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getStaff(): ?BookNowStaff
    {
        return $this->staff;
    }

    public function setStaff(?BookNowStaff $staff): self
    {
        $this->staff = $staff;

        return $this;
    }

    public function getMerchants(): array
    {
        return $this->merchants;
    }

    public function setMerchants(array $merchants): self
    {
        $this->merchants = $merchants;

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
