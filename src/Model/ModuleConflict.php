<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ModuleConflict extends ErrorMessage
{
    private ?ModuleError $error = null;

    public function getError(): ?ModuleError
    {
        return $this->error;
    }

    public function setError(?ModuleError $error): self
    {
        $this->error = $error;

        return $this;
    }
}
