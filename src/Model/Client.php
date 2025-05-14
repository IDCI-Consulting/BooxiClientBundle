<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Client
{
    private ?int $id = null;
    private ?string $membershipNumber = null;
    private ?int $merchantId = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $language = null;
    private ?string $email = null;
    private ?string $homePhoneNumber = null;
    private ?string $mobilePhoneNumber = null;
    private ?bool $remindBySMS = null;
    private ?bool $remindByEmail = null;
    private ?bool $inMailingList = null;
    private ?DateOfBirth $dateOfBirth = null;
    private ?Address $address = null;
    private ?Gender $gender = null;
    private ?ClientStatus $status = null;
    private ?string $quickNote = null;
    private ?\DateTimeInterface $createdOn = null;
    private ?\DateTimeInterface $modifiedOn = null;
    private array $metadata = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMembershipNumber(): ?string
    {
        return $this->membershipNumber;
    }

    public function setMembershipNumber(?string $membershipNumber): self
    {
        $this->membershipNumber = $membershipNumber;

        return $this;
    }

    public function getMerchantId(): ?int
    {
        return $this->merchantId;
    }

    public function setMerchantId(?int $merchantId): self
    {
        $this->merchantId = $merchantId;

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

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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

    public function getRemindBySMS(): ?bool
    {
        return $this->remindBySMS;
    }

    public function setRemindBySMS(?bool $remindBySMS): self
    {
        $this->remindBySMS = $remindBySMS;

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

    public function getInMailingList(): ?bool
    {
        return $this->inMailingList;
    }

    public function setInMailingList(?bool $inMailingList): self
    {
        $this->inMailingList = $inMailingList;

        return $this;
    }

    public function getDateOfBirth(): ?DateOfBirth
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?DateOfBirth $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getStatus(): ?ClientStatus
    {
        return $this->status;
    }

    public function setStatus(?ClientStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getQuickNote(): ?string
    {
        return $this->quickNote;
    }

    public function setQuickNote(?string $quickNote): self
    {
        $this->quickNote = $quickNote;

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

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }
}
