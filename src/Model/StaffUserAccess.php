<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class StaffUserAccess
{
    private ?int $staffId = null;
    private ?string $loginEmail = null;
    private ?UserRole $userRole = null;
    private ?UserProvider $provider = null;
    private ?string $providerName = null;
    private ?bool $canLogin = null;
    private ?\DateTimeInterface $lastLogin = null;

    public function getStaffId(): ?int
    {
        return $this->staffId;
    }

    public function setStaffId(?int $staffId): self
    {
        $this->staffId = $staffId;

        return $this;
    }

    public function getLoginEmail(): ?string
    {
        return $this->loginEmail;
    }

    public function setLoginEmail(?string $loginEmail): self
    {
        $this->loginEmail = $loginEmail;

        return $this;
    }

    public function getUserRole(): ?UserRole
    {
        return $this->userRole;
    }

    public function setUserRole(?UserRole $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }

    public function getProvider(): ?UserProvider
    {
        return $this->provider;
    }

    public function setProvider(?UserProvider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getProviderName(): ?string
    {
        return $this->providerName;
    }

    public function setProviderName(?string $providerName): self
    {
        $this->providerName = $providerName;

        return $this;
    }

    public function getCanLogin(): ?bool
    {
        return $this->canLogin;
    }

    public function setCanLogin(?bool $canLogin): self
    {
        $this->canLogin = $canLogin;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }
}
