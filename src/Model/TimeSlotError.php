<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum TimeSlotError: string
{
    case ModificationNotAllowed = 'ModificationNotAllowed';
    case StaffWithoutCalendar = 'StaffWithoutCalendar';
}
