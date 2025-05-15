<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingPayment
{
    private ?string $total = null;
    private ?string $paid = null;
    private ?string $onlinePaymentId = null;
    private ?string $onlinePaymentAmount = null;
    private ?OnlinePaymentStatus $onlinePaymentStatus = null;

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getPaid(): ?string
    {
        return $this->paid;
    }

    public function setPaid(?string $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getOnlinePaymentId(): ?string
    {
        return $this->onlinePaymentId;
    }

    public function setOnlinePaymentId(?string $onlinePaymentId): self
    {
        $this->onlinePaymentId = $onlinePaymentId;

        return $this;
    }

    public function getOnlinePaymentAmount(): ?string
    {
        return $this->onlinePaymentAmount;
    }

    public function setOnlinePaymentAmount(?string $onlinePaymentAmount): self
    {
        $this->onlinePaymentAmount = $onlinePaymentAmount;

        return $this;
    }

    public function getOnlinePaymentStatus(): ?OnlinePaymentStatus
    {
        return $this->onlinePaymentStatus;
    }

    public function setOnlinePaymentStatus(?OnlinePaymentStatus $onlinePaymentStatus): self
    {
        $this->onlinePaymentStatus = $onlinePaymentStatus;

        return $this;
    }
}
