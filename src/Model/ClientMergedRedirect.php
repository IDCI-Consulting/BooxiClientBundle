<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ClientMergedRedirect extends ErrorMessage
{
    private ?int $newClientId = null;

    public function getNewClientId(): ?int
    {
        return $this->newClientId;
    }

    public function setNewClientId(?int $newClientId): self
    {
        $this->newClientId = $newClientId;

        return $this;
    }
}