<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingErrorIgnored: string
{
    case BookingIsCompleted = 'BookingIsCompleted';
    case BookingHasPassed = 'BookingHasPassed';
    case BookingNotToday = 'BookingNotToday';
    case BookingIsCanceledByClient = 'BookingIsCanceledByClient';
    case TimeTooEarly = 'TimeTooEarly';
    case TimeTooLate = 'TimeTooLate';
    case ClientStatus = 'ClientStatus';
    case GroupEventOvercapacity = 'GroupEventOvercapacity';
    case TooManyAttendees = 'TooManyAttendees';
    case StaffNotAvailable = 'StaffNotAvailable';
    case ResourceNotAvailable = 'ResourceNotAvailable';
}