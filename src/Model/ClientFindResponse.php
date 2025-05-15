<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ClientFindResponse
{
    /**
     * @var array<Client>
     */
    private array $clients = [];
    /**
     * @var array<ClientModuleLink>
     */
    private array $clientLinks = [];

    public function getClients(): array
    {
        return $this->clients;
    }

    public function setClients(array $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getClientLinks(): array
    {
        return $this->clientLinks;
    }

    public function setClientLinks(array $clientLinks): self
    {
        $this->clientLinks = $clientLinks;

        return $this;
    }
}
