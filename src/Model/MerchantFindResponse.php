<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class TimeSlotFindResponse
{
    /**
     * @var array<Merchant>
     */
    private array $merchants = [];
    /**
     * @var array<MerchantModuleLink>
     */
    private array $merchantLinks = [];
    private ?string $cursor = null;

    public function getMerchants(): array
    {
        return $this->merchants;
    }

    public function setMerchants(array $merchants): self
    {
        $this->merchants = $merchants;

        return $this;
    }

    public function getMerchantLinks(): array
    {
        return $this->merchantLinks;
    }

    public function setMerchantLinks(array $merchantLinks): self
    {
        $this->merchantLinks = $merchantLinks;

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