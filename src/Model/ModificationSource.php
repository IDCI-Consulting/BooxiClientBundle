<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ModificationSource: string
{
    case Staff = 'Staff';
    case Client = 'Client';
}