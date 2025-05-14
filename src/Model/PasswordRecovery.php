<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class PasswordRecovery
{
    private ?int $id = null;
    private ?int $staffId = null;
    private ?string $loginEmail = null;
    private ?int $code = null;
    private ?string $staffFirstName = null;
    private ?string $staffLastName = null;
    private ?\DateTimeInterface $requestDate = null;
    private ?PasswordRecoveryCodeState $codeState = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getStaffFirstName(): ?string
    {
        return $this->staffFirstName;
    }

    public function setStaffFirstName(?string $staffFirstName): self
    {
        $this->staffFirstName = $staffFirstName;

        return $this;
    }

    public function getStaffLastName(): ?string
    {
        return $this->staffLastName;
    }

    public function setStaffLastName(?string $staffLastName): self
    {
        $this->staffLastName = $staffLastName;

        return $this;
    }

    public function getRequestDate(): ?\DateTimeInterface
    {
        return $this->requestDate;
    }

    public function setRequestDate(?\DateTimeInterface $requestDate): self
    {
        $this->requestDate = $requestDate;

        return $this;
    }

    public function getCodeState(): ?PasswordRecoveryCodeState
    {
        return $this->codeState;
    }

    public function setCodeState(?PasswordRecoveryCodeState $codeState): self
    {
        $this->codeState = $codeState;

        return $this;
    }
}
