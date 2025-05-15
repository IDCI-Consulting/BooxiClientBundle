<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class CalendarEventListResponse
{
    /**
     * @var array<CalendarEvent>
     */
    private array $calendarEvents = [];
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
     * @var array<TimeSlot>
     */
    private array $timeSlots = [];
    private ?string $cursor = null;

    public function getCalendarEvents(): array
    {
        return $this->calendarEvents;
    }

    public function setCalendarEvents(array $calendarEvents): self
    {
        $this->calendarEvents = $calendarEvents;

        return $this;
    }

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

    public function getTimeSlots(): array
    {
        return $this->timeSlots;
    }

    public function setTimeSlots(array $timeSlots): self
    {
        $this->timeSlots = $timeSlots;

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
