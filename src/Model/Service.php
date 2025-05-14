<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Service
{
    private ?int $id = null;
    private ?int $merchantId = null;
    private ?string $name = null;
    private ?string $tags = null;
    private ?int $duration = null;
    private ?bool $showDuration = null;
    private ?bool $hasDurationCustomization = null;
    private ?BookingMethod $bookingMethod = null;
    private ?BookingLocation $location = null;
    private ?string $locationText = null;
    private ?Price $price = null;
    private ?bool $hasPriceCustomization = null;
    private ?int $categoryId = null;
    private ?string $categoryName = null;
    private ?string $description = null;
    private ?string $profileImageUrl = null;
    private ?ServiceStaffSelectionMode $staffSelectionMode = null;
    private ?ServiceTimeSelectionMode $timeSelectionMode = null;
    private ?int $maxReservationSize = null;
    private ?string $bookingPolicy = null;
    private ?string $instructions = null;
    private array $metadata = [];
    private array $surveyModel = [];
    private ?bool $isSurveyRequired = null;
    private ?string $surveyText = null;
    private ?SurveyType $surveyType = null;
    private ?OnlineStatus $status = null;
    private ?RentalReturnMode $rentalReturnMode = null;
    private ?int $serviceTemplateId = null;
    private ?bool $isTemplate = null;
    private ?\DateTimeInterface $createdOn = null;
    private ?\DateTimeInterface $modifiedOn = null;
    private ?int $spacingAfter = null;
    private ?bool $isBusySpacingAfter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getShowDuration(): ?bool
    {
        return $this->showDuration;
    }

    public function setShowDuration(?bool $showDuration): self
    {
        $this->showDuration = $showDuration;

        return $this;
    }

    public function getHasDurationCustomization(): ?bool
    {
        return $this->hasDurationCustomization;
    }

    public function setHasDurationCustomization(?bool $hasDurationCustomization): self
    {
        $this->hasDurationCustomization = $hasDurationCustomization;

        return $this;
    }

    public function getBookingMethod(): ?BookingMethod
    {
        return $this->bookingMethod;
    }

    public function setBookingMethod(?BookingMethod $bookingMethod): self
    {
        $this->bookingMethod = $bookingMethod;

        return $this;
    }

    public function getLocation(): ?BookingLocation
    {
        return $this->location;
    }

    public function setLocation(?BookingLocation $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocationText(): ?string
    {
        return $this->locationText;
    }

    public function setLocationText(?string $locationText): self
    {
        $this->locationText = $locationText;

        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getHasPriceCustomization(): ?bool
    {
        return $this->hasPriceCustomization;
    }

    public function setHasPriceCustomization(?bool $hasPriceCustomization): self
    {
        $this->hasPriceCustomization = $hasPriceCustomization;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(?string $categoryName): self
    {
        $this->categoryName = $categoryName;

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

    public function getProfileImageUrl(): ?string
    {
        return $this->profileImageUrl;
    }

    public function setProfileImageUrl(?string $profileImageUrl): self
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    public function getStaffSelectionMode(): ?ServiceStaffSelectionMode
    {
        return $this->staffSelectionMode;
    }

    public function setStaffSelectionMode(?ServiceStaffSelectionMode $staffSelectionMode): self
    {
        $this->staffSelectionMode = $staffSelectionMode;

        return $this;
    }

    public function getTimeSelectionMode(): ?ServiceTimeSelectionMode
    {
        return $this->timeSelectionMode;
    }

    public function setTimeSelectionMode(?ServiceTimeSelectionMode $timeSelectionMode): self
    {
        $this->timeSelectionMode = $timeSelectionMode;

        return $this;
    }

    public function getMaxReservationSize(): ?int
    {
        return $this->maxReservationSize;
    }

    public function setMaxReservationSize(?int $maxReservationSize): self
    {
        $this->maxReservationSize = $maxReservationSize;

        return $this;
    }

    public function getBookingPolicy(): ?string
    {
        return $this->bookingPolicy;
    }

    public function setBookingPolicy(?string $bookingPolicy): self
    {
        $this->bookingPolicy = $bookingPolicy;

        return $this;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;

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

    public function getSurveyModel(): array
    {
        return $this->surveyModel;
    }

    public function setSurveyModel(array $surveyModel): self
    {
        $this->surveyModel = $surveyModel;

        return $this;
    }

    public function getIsSurveyRequired(): ?bool
    {
        return $this->isSurveyRequired;
    }

    public function setIsSurveyRequired(?bool $isSurveyRequired): self
    {
        $this->isSurveyRequired = $isSurveyRequired;

        return $this;
    }

    public function getSurveyText(): ?string
    {
        return $this->surveyText;
    }

    public function setSurveyText(?string $surveyText): self
    {
        $this->surveyText = $surveyText;

        return $this;
    }

    public function getSurveyType(): ?SurveyType
    {
        return $this->surveyType;
    }

    public function setSurveyType(?SurveyType $surveyType): self
    {
        $this->surveyType = $surveyType;

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

    public function getRentalReturnMode(): ?RentalReturnMode
    {
        return $this->rentalReturnMode;
    }

    public function setRentalReturnMode(?RentalReturnMode $rentalReturnMode): self
    {
        $this->rentalReturnMode = $rentalReturnMode;

        return $this;
    }

    public function getServiceTemplateId(): ?int
    {
        return $this->serviceTemplateId;
    }

    public function setServiceTemplateId(?int $serviceTemplateId): self
    {
        $this->serviceTemplateId = $serviceTemplateId;

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

    public function getSpacingAfter(): ?int
    {
        return $this->spacingAfter;
    }

    public function setSpacingAfter(?int $spacingAfter): self
    {
        $this->spacingAfter = $spacingAfter;

        return $this;
    }

    public function getIsBusySpacingAfter(): ?bool
    {
        return $this->isBusySpacingAfter;
    }

    public function setIsBusySpacingAfter(?bool $isBusySpacingAfter): self
    {
        $this->isBusySpacingAfter = $isBusySpacingAfter;

        return $this;
    }
}
