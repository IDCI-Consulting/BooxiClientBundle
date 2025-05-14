<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum RentalReturnMode: string
{
    case DayStart = 'DayStart';
    case DayEnd = 'DayEnd';
    case ExactNext = 'ExactNext';
}