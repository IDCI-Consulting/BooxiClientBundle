<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Appointment extends Booking
{
    /**
     * @var array<AppointmentItem>
     */
    protected array $items = [];
    private ?bool $isScheduled = null;
    /**
     * @var array<BookingClientAvailability>
     */
    private array $clientAvailability = [];
    private ?int $clientCount = null;
    private ?AppointmentClient $client = null;
    private ?string $quickNote = null;

    public function getIsScheduled(): ?bool
    {
        return $this->isScheduled;
    }

    public function setIsScheduled(?bool $isScheduled): self
    {
        $this->isScheduled = $isScheduled;

        return $this;
    }

    public function getClientAvailability(): array
    {
        return $this->clientAvailability;
    }

    public function setClientAvailability(array $clientAvailability): self
    {
        $this->clientAvailability = $clientAvailability;

        return $this;
    }

    public function getClientCount(): ?int
    {
        return $this->clientCount;
    }

    public function setClientCount(?int $clientCount): self
    {
        $this->clientCount = $clientCount;

        return $this;
    }

    public function getClient(): ?AppointmentClient
    {
        return $this->client;
    }

    public function setClient(?AppointmentClient $client): self
    {
        $this->client = $client;

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
}