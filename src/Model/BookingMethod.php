<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingMethod: string
{
    case Appointment = 'Appointment';
    case GroupReservation = 'GroupReservation';
    case Rental = 'Rental';
}