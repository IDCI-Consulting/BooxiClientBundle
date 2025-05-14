<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookNowMerchant extends Merchant
{
    /**
     * @var array<OpenHour>
     */
    private array $openHours = [];

    public function getOpenHours(): array
    {
        return $this->openHours;
    }

    public function setOpenHours(array $openHours): self
    {
        $this->openHours = $openHours;

        return $this;
    }
}
