<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingRuleset: string
{
    case None = 'None';
    case AttendeeCount = 'AttendeeCount';
    case Availability = 'Availability';
    case TimeConstraints = 'TimeConstraints';
    case ClientBlocked = 'ClientBlocked';
}