<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum OnlineStatus: string
{
    case Online = 'Online';
    case Offline = 'Offline';
}