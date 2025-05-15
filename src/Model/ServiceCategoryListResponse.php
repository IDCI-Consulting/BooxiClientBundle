<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceCategoryListResponse
{
    /**
     * @var array<ServiceCategory>
     */
    private array $serviceCategories = [];
    private ?string $cursor = null;

    public function getServiceCategories(): array
    {
        return $this->serviceCategories;
    }

    public function setServiceCategories(array $serviceCategories): self
    {
        $this->serviceCategories = $serviceCategories;

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
