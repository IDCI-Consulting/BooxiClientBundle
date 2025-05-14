<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Staff
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $position = null;
    private ?string $biography = null;
    private ?string $profileImageUrl = null;
    private ?StaffTimeSelectionMode $timeSelectionMode = null;
    private ?string $mobilePhone = null;
    private ?string $workPhone = null;
    private ?string $communicationEmail = null;
    private ?string $loginEmail = null;
    private ?UserRole $userRole = null;
    private ?InvitationStatus $invitationStatus = null;
    private ?string $language = null;
    private ?PersonnelType $personnelType = null;
    private ?OnlineStatus $status = null;
    private ?\DateTimeInterface $createdOn = null;
    private ?\DateTimeInterface $modifiedOn = null;
    private ?bool $isTemplate = null;
    private ?int $staffTemplateId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getProfileImageUrl(): ?string
    {
        return $this->profileImageUrl;
    }

    public function setProfileImageUrl(?string $profileImageUrl): self
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    public function getTimeSelectionMode(): ?StaffTimeSelectionMode
    {
        return $this->timeSelectionMode;
    }

    public function setTimeSelectionMode(?StaffTimeSelectionMode $timeSelectionMode): self
    {
        $this->timeSelectionMode = $timeSelectionMode;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    public function setWorkPhone(?string $workPhone): self
    {
        $this->workPhone = $workPhone;

        return $this;
    }

    public function getCommunicationEmail(): ?string
    {
        return $this->communicationEmail;
    }

    public function setCommunicationEmail(?string $communicationEmail): self
    {
        $this->communicationEmail = $communicationEmail;

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

    public function getInvitationStatus(): ?InvitationStatus
    {
        return $this->invitationStatus;
    }

    public function setInvitationStatus(?InvitationStatus $invitationStatus): self
    {
        $this->invitationStatus = $invitationStatus;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPersonnelType(): ?PersonnelType
    {
        return $this->personnelType;
    }

    public function setPersonnelType(?PersonnelType $personnelType): self
    {
        $this->personnelType = $personnelType;

        return $this;
    }

    public function getStatus(): ?OnlineStatus
    {
        return $this->status;
    }

    public function setStatus(?OnlineStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getModifiedOn(): ?\DateTimeInterface
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(?\DateTimeInterface $modifiedOn): self
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    public function getIsTemplate(): ?bool
    {
        return $this->isTemplate;
    }

    public function setIsTemplate(?bool $isTemplate): self
    {
        $this->isTemplate = $isTemplate;

        return $this;
    }

    public function getStaffTemplateId(): ?int
    {
        return $this->staffTemplateId;
    }

    public function setStaffTemplateId(?int $staffTemplateId): self
    {
        $this->staffTemplateId = $staffTemplateId;

        return $this;
    }
}
