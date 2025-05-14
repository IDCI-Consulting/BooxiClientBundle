<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceModuleLinkResponse
{
    private ?ServiceModuleLink $link = null;
    private ?BookNowService $service = null;

    public function getLink(): ?ServiceModuleLink
    {
        return $this->link;
    }

    public function setLink(?ServiceModuleLink $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getService(): ?BookNowService
    {
        return $this->service;
    }

    public function setService(?BookNowService $service): self
    {
        $this->service = $service;

        return $this;
    }
}