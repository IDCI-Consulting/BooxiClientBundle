<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class StaffUserAccessResponse
{
    private ?StaffUserAccess $userAccess = null;
    private ?Staff $staff = null;

    public function getUserAccess(): ?StaffUserAccess
    {
        return $this->userAccess;
    }

    public function setUserAccess(?StaffUserAccess $userAccess): self
    {
        $this->userAccess = $userAccess;

        return $this;
    }

    public function getStaff(): ?Staff
    {
        return $this->staff;
    }

    public function setStaff(?Staff $staff): self
    {
        $this->staff = $staff;

        return $this;
    }
}
