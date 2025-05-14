<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ClientModuleLinkResponse
{
    private ?ClientModuleLink $link = null;
    private ?Client $client = null;

    public function getLink(): ?ClientModuleLink
    {
        return $this->link;
    }

    public function setLink(?ClientModuleLink $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}