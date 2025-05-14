<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceCategoryTranslations
{
    /**
     * @var array<ServiceCategoryTranslation>
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