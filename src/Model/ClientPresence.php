<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ClientPresence: string
{
    case Expecting = 'Expecting';
    case Arrived = 'Arrived';
    case NoShow = 'NoShow';
}
