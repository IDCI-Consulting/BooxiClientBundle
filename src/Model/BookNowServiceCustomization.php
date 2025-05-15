<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookNowServiceCustomization
{
    private ?int $serviceId = null;
    private ?int $staffId = null;
    private ?bool $hasCustomDuration = null;
    private ?int $duration = null;
    private ?bool $hasCustomPrice = null;
    private ?Price $price = null;

    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    public function setServiceId(?int $serviceId): self
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function getStaffId(): ?int
    {
        return $this->staffId;
    }

    public function setStaffId(?int $staffId): self
    {
        $this->staffId = $staffId;

        return $this;
    }

    public function getHasCustomDuration(): ?bool
    {
        return $this->hasCustomDuration;
    }

    public function setHasCustomDuration(?bool $hasCustomDuration): self
    {
        $this->hasCustomDuration = $hasCustomDuration;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getHasCustomPrice(): ?bool
    {
        return $this->hasCustomPrice;
    }

    public function setHasCustomPrice(?bool $hasCustomPrice): self
    {
        $this->hasCustomPrice = $hasCustomPrice;

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }
}
