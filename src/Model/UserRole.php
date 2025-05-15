<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum UserRole: string
{
    case Admin = 'Admin';
    case Supervisor = 'Supervisor';
    case Manager = 'Manager';
    case Staff = 'Staff';
    case RestrictedStaff = 'RestrictedStaff';
}
