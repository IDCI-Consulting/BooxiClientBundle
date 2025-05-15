<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class PaymentConflict extends ErrorMessage
{
    private ?PaymentError $error = null;

    public function getError(): ?PaymentError
    {
        return $this->error;
    }

    public function setError(?PaymentError $error): self
    {
        $this->error = $error;

        return $this;
    }
}
