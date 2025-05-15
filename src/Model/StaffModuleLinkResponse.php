<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

class StaffModuleLinkResponse
{
    private ?StaffModuleLink $link = null;
    private ?BookNowStaff $staff = null;

    public function getLink(): ?StaffModuleLink
    {
        return $this->link;
    }

    public function setLink(?StaffModuleLink $link): self
    {
        $this->link = $link;

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
}
