<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingItem
{
    protected ?int $serviceId = null;
    protected ?string $serviceName = null;
    protected ?Price $price = null;
    protected ?Timespan $reservedClientTimespan = null;
    protected ?string $shoppingCartProductId = null;

    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    public function setServiceId(?int $serviceId): self
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    public function setServiceName(?string $serviceName): self
    {
        $this->serviceName = $serviceName;

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

    public function getReservedClientTimespan(): ?Timespan
    {
        return $this->reservedClientTimespan;
    }

    public function setReservedClientTimespan(?Timespan $reservedClientTimespan): self
    {
        $this->reservedClientTimespan = $reservedClientTimespan;

        return $this;
    }

    public function getShoppingCartProductId(): ?string
    {
        return $this->shoppingCartProductId;
    }

    public function setShoppingCartProductId(?string $shoppingCartProductId): self
    {
        $this->shoppingCartProductId = $shoppingCartProductId;

        return $this;
    }
}
