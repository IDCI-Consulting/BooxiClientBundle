<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class MerchantModuleLink
{
    private ?int $merchantId = null;
    private ?string $moduleId = null;
    private ?string $externalId = null;
    private array $metadata = [];
    private ?\DateTimeInterface $createdOn = null;
    private ?\DateTimeInterface $modifiedOn = null;

    public function getMerchantId(): ?int
    {
        return $this->merchantId;
    }

    public function setMerchantId(?int $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function getModuleId(): ?string
    {
        return $this->moduleId;
    }

    public function setModuleId(?string $moduleId): self
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

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
}
