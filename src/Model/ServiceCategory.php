<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceCategory
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description = null;
    private ?string $profileImageUrl = null;
    private ?int $merchantId = null;
    private ?bool $isTemplate = null;
    private ?int $serviceCategoryTemplateId = null;

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

    public function getMerchantId(): ?int
    {
        return $this->merchantId;
    }

    public function setMerchantId(?int $merchantId): self
    {
        $this->merchantId = $merchantId;

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

    public function getServiceCategoryTemplateId(): ?int
    {
        return $this->serviceCategoryTemplateId;
    }

    public function setServiceCategoryTemplateId(?int $serviceCategoryTemplateId): self
    {
        $this->serviceCategoryTemplateId = $serviceCategoryTemplateId;

        return $this;
    }
}
