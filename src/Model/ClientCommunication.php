<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ClientCommunication: string
{
    case ClientOnly = 'ClientOnly';
    case ClientAndAttendees = 'ClientAndAttendees';
}