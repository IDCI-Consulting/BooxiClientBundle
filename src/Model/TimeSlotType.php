<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum TimeSlotType: string
{
    case Available = 'Available';
    case Busy = 'Busy';
}
