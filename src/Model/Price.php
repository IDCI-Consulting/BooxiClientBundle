<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Price
{
    private ?PriceVisibility $visibility = null;
    private ?string $amount = null;
    private ?string $amountPerPerson = null;
    private ?string $amountPerHour = null;
    private ?string $currency = null;
    private ?bool $isStartingAt = null;
    private ?PriceTax $tax = null;

    public function getVisibility(): ?PriceVisibility
    {
        return $this->visibility;
    }

    public function setVisibility(?PriceVisibility $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmountPerPerson(): ?string
    {
        return $this->amountPerPerson;
    }

    public function setAmountPerPerson(?string $amountPerPerson): self
    {
        $this->amountPerPerson = $amountPerPerson;

        return $this;
    }

    public function getAmountPerHour(): ?string
    {
        return $this->amountPerHour;
    }

    public function setAmountPerHour(?string $amountPerHour): self
    {
        $this->amountPerHour = $amountPerHour;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getIsStartingAt(): ?bool
    {
        return $this->isStartingAt;
    }

    public function setIsStartingAt(?bool $isStartingAt): self
    {
        $this->isStartingAt = $isStartingAt;

        return $this;
    }

    public function getTax(): ?PriceTax
    {
        return $this->tax;
    }

    public function setTax(?PriceTax $tax): self
    {
        $this->tax = $tax;

        return $this;
    }
}