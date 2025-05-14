<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Merchant
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?bool $isAvailableOnline = null;
    protected ?string $storeNumber = null;
    protected ?int $groupId = null;
    protected ?string $groupName = null;
    protected ?int $groupCategoryId = null;
    protected ?string $groupCategoryName = null;
    protected ?Address $address = null;
    protected ?string $contactFirstName = null;
    protected ?string $contactLastName = null;
    protected ?string $phoneNumber = null;
    protected ?string $email = null;
    protected ?string $tags = null;
    protected ?string $websiteUrl = null;
    protected ?string $bookingUrl = null;
    protected ?string $apiKey = null;
    protected ?string $description = null;
    protected ?string $coverImageUrl = null;
    protected ?string $profileImageUrl = null;
    protected ?string $currency = null;
    protected ?string $tax1Name = null;
    protected ?string $tax1Rate = null;
    protected ?string $tax2Name = null;
    protected ?string $tax2Rate = null;
    protected ?string $timeZone = null;
    protected ?string $latitude = null;
    protected ?string $longitude = null;
    protected ?string $defaultLanguage = null;

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

    public function getIsAvailableOnline(): ?bool
    {
        return $this->isAvailableOnline;
    }

    public function setIsAvailableOnline(?bool $isAvailableOnline): self
    {
        $this->isAvailableOnline = $isAvailableOnline;

        return $this;
    }

    public function getStoreNumber(): ?string
    {
        return $this->storeNumber;
    }

    public function setStoreNumber(?string $storeNumber): self
    {
        $this->storeNumber = $storeNumber;

        return $this;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getGroupCategoryId(): ?int
    {
        return $this->groupCategoryId;
    }

    public function setGroupCategoryId(?int $groupCategoryId): self
    {
        $this->groupCategoryId = $groupCategoryId;

        return $this;
    }

    public function getGroupCategoryName(): ?string
    {
        return $this->groupCategoryName;
    }

    public function setGroupCategoryName(?string $groupCategoryName): self
    {
        $this->groupCategoryName = $groupCategoryName;

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

    public function getContactFirstName(): ?string
    {
        return $this->contactFirstName;
    }

    public function setContactFirstName(?string $contactFirstName): self
    {
        $this->contactFirstName = $contactFirstName;

        return $this;
    }

    public function getContactLastName(): ?string
    {
        return $this->contactLastName;
    }

    public function setContactLastName(?string $contactLastName): self
    {
        $this->contactLastName = $contactLastName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

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

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getBookingUrl(): ?string
    {
        return $this->bookingUrl;
    }

    public function setBookingUrl(?string $bookingUrl): self
    {
        $this->bookingUrl = $bookingUrl;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function setApiKey(?string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCoverImageUrl(): ?string
    {
        return $this->coverImageUrl;
    }

    public function setCoverImageUrl(?string $coverImageUrl): self
    {
        $this->coverImageUrl = $coverImageUrl;

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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getTax1Name(): ?string
    {
        return $this->tax1Name;
    }

    public function setTax1Name(?string $tax1Name): self
    {
        $this->tax1Name = $tax1Name;

        return $this;
    }

    public function getTax1Rate(): ?string
    {
        return $this->tax1Rate;
    }

    public function setTax1Rate(?string $tax1Rate): self
    {
        $this->tax1Rate = $tax1Rate;

        return $this;
    }

    public function getTax2Name(): ?string
    {
        return $this->tax2Name;
    }

    public function setTax2Name(?string $tax2Name): self
    {
        $this->tax2Name = $tax2Name;

        return $this;
    }

    public function getTax2Rate(): ?string
    {
        return $this->tax2Rate;
    }

    public function setTax2Rate(?string $tax2Rate): self
    {
        $this->tax2Rate = $tax2Rate;

        return $this;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function setTimeZone(?string $timeZone): self
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }

    public function setDefaultLanguage(?string $defaultLanguage): self
    {
        $this->defaultLanguage = $defaultLanguage;

        return $this;
    }
}