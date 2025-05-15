<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum BookingLocation: string
{
    case Business = 'Business';
    case Home = 'Home';
    case Phone = 'Phone';
    case VideoConference = 'VideoConference';
    case Custom = 'Custom';
}
