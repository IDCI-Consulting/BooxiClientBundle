<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ClientStatus: string
{
    case Active = 'Active';
    case Blocked = 'Blocked';
}