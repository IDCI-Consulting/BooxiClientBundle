<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum PaymentStatus: string
{
    case Requested = 'Requested';
    case Collected = 'Collected';
    case Cancelled = 'Cancelled';
}
