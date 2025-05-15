<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum Gender: string
{
    case Unknown = 'Unknown';
    case Female = 'Female';
    case Male = 'Male';
    case Other = 'Other';
}
