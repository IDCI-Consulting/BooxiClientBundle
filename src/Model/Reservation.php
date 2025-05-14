<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class Reservation extends Booking
{
    private ?int $groupEventId = null;
    private ?AppointmentClient $client = null;
    /**
     * @var array<ReservationAttendee>
     */
    private array $attendees = [];
    private ?ClientCommunication $clientCommunication = null;

    public function getGroupEventId(): ?int
    {
        return $this->groupEventId;
    }

    public function setGroupEventId(?int $groupEventId): self
    {
        $this->groupEventId = $groupEventId;

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

    public function getAttendees(): array
    {
        return $this->attendees;
    }

    public function setAttendees(array $attendees): self
    {
        $this->attendees = $attendees;

        return $this;
    }

    public function getClientCommunication(): ?ClientCommunication
    {
        return $this->clientCommunication;
    }

    public function setQuickNote(?ClientCommunication $clientCommunication): self
    {
        $this->clientCommunication = $clientCommunication;

        return $this;
    }
}