<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingStatus: string
{
    case PendingStaffApproval = 'PendingStaffApproval';
    case PendingClientApproval = 'PendingClientApproval';
    case Approved = 'Approved';
    case Cancelled = 'Cancelled';
}