<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceCategoryModuleLinkResponse
{
    private ?ServiceCategoryModuleLink $link = null;
    private ?ServiceCategory $serviceCategory = null;

    public function getLink(): ?ServiceModuleLink
    {
        return $this->link;
    }

    public function setLink(?ServiceModuleLink $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getServiceCategory(): ?ServiceCategory
    {
        return $this->serviceCategory;
    }

    public function setServiceCategory(?ServiceCategory $serviceCategory): self
    {
        $this->serviceCategory = $serviceCategory;

        return $this;
    }
}
