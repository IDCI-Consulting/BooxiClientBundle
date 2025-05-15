<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum OnlinePaymentStatus: string
{
    case None = 'None';
    case Requested = 'Requested';
    case Paid = 'Paid';
}