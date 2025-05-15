<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ServiceTranslation
{
    private ?string $language = null;
    private ?string $name = null;
    private ?string $instructions = null;
    private ?string $description = null;
    private ?string $surveyText = null;
    private array $surveyModel = [];

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;

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

    public function getSurveyText(): ?string
    {
        return $this->surveyText;
    }

    public function setSurveyText(?string $surveyText): self
    {
        $this->surveyText = $surveyText;

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
}
