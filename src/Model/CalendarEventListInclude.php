<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum CalendarEventListInclude: string
{
    case None = 'None';
    case Appointment = 'Appointment';
    case GroupEvent = 'GroupEvent';
    case TimeSlot = 'TimeSlot';
    case Staff = 'Staff';
    case Service = 'Service';
}
