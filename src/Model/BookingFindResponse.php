<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class BookingFindResponse
{
    /**
     * @var array<Booking>
     */
    private array $bookings = [];
    /**
     * @var array<GroupEvent>
     */
    private array $groupEvents = [];
    /**
     * @var array<BookNowService>
     */
    private array $services = [];
    private ?BookNowStaff $staff = null;
    /**
     * @var array<BookNowMerchant>
     */
    private array $merchants = [];
    /**
     * @var array<Resource>
     */
    private array $resources = [];
    private ?string $cursor = null;

    public function getBookings(): array
    {
        return $this->bookings;
    }

    public function setBookings(array $bookings): self
    {
        $this->bookings = $bookings;

        return $this;
    }

    public function getGroupEvents(): array
    {
        return $this->groupEvents;
    }

    public function setGroupEvents(array $groupEvents): self
    {
        $this->groupEvents = $groupEvents;

        return $this;
    }

    public function getServices(): array
    {
        return $this->services;
    }

    public function setServices(array $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getStaff(): ?BookNowStaff
    {
        return $this->staff;
    }

    public function setStaff(?BookNowStaff $staff): self
    {
        $this->staff = $staff;

        return $this;
    }

    public function getMerchants(): array
    {
        return $this->merchants;
    }

    public function setMerchants(array $merchants): self
    {
        $this->merchants = $merchants;

        return $this;
    }

    public function getResources(): array
    {
        return $this->resources;
    }

    public function setResources(array $resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    public function setCursor(?string $cursor): self
    {
        $this->cursor = $cursor;

        return $this;
    }
}
