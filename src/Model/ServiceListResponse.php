<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceListResponse
{
    /**
     * @var array<Service>
     */
    private array $services = [];
    private ?string $cursor = null;

    public function getServices(): array
    {
        return $this->services;
    }

    public function setServices(array $services): self
    {
        $this->services = $services;

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
