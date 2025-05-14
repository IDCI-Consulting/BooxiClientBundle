<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum StaffTimeSelectionMode: string
{
    case ServiceTimeSelection = 'ServiceTimeSelection';
    case ClientTimes = 'ClientTimes';
}