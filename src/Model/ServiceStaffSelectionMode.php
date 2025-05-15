<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum ServiceStaffSelectionMode: string
{
    case AssignedStaff = 'AssignedStaff';
    case OptionalAssignedStaff = 'OptionalAssignedStaff';
    case Disabled = 'Disabled';
}
