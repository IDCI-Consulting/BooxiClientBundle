<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class ReservationAttendee extends BookingClient
{
    private ?bool $isRequester = null;
    private array $surveyAnswers = [];

    public function getIsRequester(): ?bool
    {
        return $this->isRequester;
    }

    public function setIsRequester(?bool $isRequester): self
    {
        $this->isRequester = $isRequester;

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
}
