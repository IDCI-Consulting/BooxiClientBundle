<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceTranslations
{
    /**
     * @var array<ServiceTranslation>
     */
    private array $translations = [];

    public function getTranslations(): array
    {
        return $this->translations;
    }

    public function setTranslations(array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
