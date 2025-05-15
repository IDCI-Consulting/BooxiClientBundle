<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class AppointmentItem extends BookingItem
{
    private ?int $duration = null;
    private ?int $spacingAfter = null;
    private ?bool $isBusySpacingAfter = null;
    private array $surveyAnswers = [];
    private ?bool $serviceHasAssociatedResources = null;
    private ?int $resourceId = null;
    private ?string $resourceName = null;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

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

    public function getSurveyAnswers(): array
    {
        return $this->surveyAnswers;
    }

    public function setSurveyAnswers(array $surveyAnswers): self
    {
        $this->surveyAnswers = $surveyAnswers;

        return $this;
    }

    public function getServiceHasAssociatedResources(): ?bool
    {
        return $this->serviceHasAssociatedResources;
    }

    public function setServiceHasAssociatedResources(?bool $serviceHasAssociatedResources): self
    {
        $this->serviceHasAssociatedResources = $serviceHasAssociatedResources;

        return $this;
    }

    public function getResourceId(): ?int
    {
        return $this->resourceId;
    }

    public function setResourceId(?int $resourceId): self
    {
        $this->resourceId = $resourceId;

        return $this;
    }

    public function getResourceName(): ?string
    {
        return $this->resourceName;
    }

    public function setResourceName(?string $resourceName): self
    {
        $this->resourceName = $resourceName;

        return $this;
    }
}
