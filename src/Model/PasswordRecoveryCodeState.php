<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum PasswordRecoveryCodeState: string
{
    case Valid = 'Valid';
    case Used = 'Used';
    case Expired = 'Expired';
}
