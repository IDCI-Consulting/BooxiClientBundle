<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingPaymentResponse
{
    private ?Payment $payment = null;

    public function getBooking(): ?Payment
    {
        return $this->payment;
    }

    public function setBooking(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }
}
