<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingError: string
{
    case BookingIsCompleted = 'BookingIsCompleted';
    case BookingHasPassed = 'BookingHasPassed';
    case BookingNotScheduled = 'BookingNotScheduled';
    case BookingNotToday = 'BookingNotToday';
    case BookingIsCanceledByClient = 'BookingIsCanceledByClient';
    case TimeTooEarly = 'TimeTooEarly';
    case TimeTooLate = 'TimeTooLate';
    case ClientStatus = 'ClientStatus';
    case GroupEventOvercapacity = 'GroupEventOvercapacity';
    case TooManyAttendees = 'TooManyAttendees';
    case StaffNotAvailable = 'StaffNotAvailable';
    case ResourceNotAvailable = 'ResourceNotAvailable';
    case BookingUsesResources = 'BookingUsesResources';
    case ClientPresenceArrived = 'ClientPresenceArrived';
    case ClientPresenceNoShow = 'ClientPresenceNoShow';
}