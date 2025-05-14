<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum InvitationStatus: string
{
    case ToInvite = 'ToInvite';
    case Invited = 'Invited';
    case Accepted = 'Accepted';
}