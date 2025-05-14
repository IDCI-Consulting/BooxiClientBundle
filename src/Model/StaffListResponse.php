<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class StaffListResponse
{
    /**
     * @var array<Staff>
     */
    private array $staffs = [];
    private ?string $cursor = null;

    public function getStaffs(): array
    {
        return $this->staffs;
    }

    public function setStaffs(array $staffs): self
    {
        $this->staffs = $staffs;

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