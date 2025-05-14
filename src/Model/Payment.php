<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Payment
{
    private ?string $id = null;
    private ?string $bookingId = null;
    private ?int $merchantId = null;
    private ?PaymentMethod $paymentMethod = null;
    private ?PaymentStatus $status = null;
    private ?string $amount = null;
    private ?string $referenceNumber = null;
    private ?\DateTimeInterface $createdOn = null;
    private ?\DateTimeInterface $collectedOn = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    public function setBookingId(?string $bookingId): self
    {
        $this->bookingId = $bookingId;

        return $this;
    }

    public function getMerchantId(): ?int
    {
        return $this->merchantId;
    }

    public function setMerchantId(?int $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getStatus(): ?PaymentStatus
    {
        return $this->status;
    }

    public function setStatus(?PaymentStatus $status): self
    {
        $this->status = $status;

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

    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(?string $referenceNumber): self
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getCollectedOn(): ?\DateTimeInterface
    {
        return $this->collectedOn;
    }

    public function setCollectedOn(?\DateTimeInterface $collectedOn): self
    {
        $this->collectedOn = $collectedOn;

        return $this;
    }
}
