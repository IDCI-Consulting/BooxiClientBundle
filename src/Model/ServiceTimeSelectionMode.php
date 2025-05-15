<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ServiceTimeSelectionMode: string
{
    case GroupEvent = 'GroupEvent';
    case TimeSlot = 'TimeSlot';
    case ClientTimes = 'ClientTimes';
}
