<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum CalendarEventType: string
{
    case Appointment = 'Appointment';
    case GroupEvent = 'GroupEvent';
    case TimeSlot = 'TimeSlot';
}