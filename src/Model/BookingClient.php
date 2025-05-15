<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingClient
{
    protected ?int $id = null;
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?string $email = null;
    protected ?string $homePhoneNumber = null;
    protected ?string $mobilePhoneNumber = null;
    protected ?ClientPresence $presence = null;
    protected ?bool $remindByEmail = null;
    protected ?bool $remindBySMS = null;
    protected ?string $additionalRequest = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHomePhoneNumber(): ?string
    {
        return $this->homePhoneNumber;
    }

    public function setHomePhoneNumber(?string $homePhoneNumber): self
    {
        $this->homePhoneNumber = $homePhoneNumber;

        return $this;
    }

    public function getMobilePhoneNumber(): ?string
    {
        return $this->mobilePhoneNumber;
    }

    public function setMobilePhoneNumber(?string $mobilePhoneNumber): self
    {
        $this->mobilePhoneNumber = $mobilePhoneNumber;

        return $this;
    }

    public function getPresence(): ?ClientPresence
    {
        return $this->presence;
    }

    public function setPresence(?ClientPresence $presence): self
    {
        $this->presence = $presence;

        return $this;
    }

    public function getRemindByEmail(): ?bool
    {
        return $this->remindByEmail;
    }

    public function setRemindByEmail(?bool $remindByEmail): self
    {
        $this->remindByEmail = $remindByEmail;

        return $this;
    }

    public function getRemindBySMS(): ?bool
    {
        return $this->remindBySMS;
    }

    public function setRemindBySMS(?bool $remindBySMS): self
    {
        $this->remindBySMS = $remindBySMS;

        return $this;
    }

    public function getAdditionalRequest(): ?string
    {
        return $this->additionalRequest;
    }

    public function setAdditionalRequest(?string $additionalRequest): self
    {
        $this->additionalRequest = $additionalRequest;

        return $this;
    }
}
