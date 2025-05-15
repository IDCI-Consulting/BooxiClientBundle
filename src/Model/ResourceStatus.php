<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ResourceStatus: string
{
    case Active = 'Active';
    case OutOfOrder = 'OutOfOrder';
}
