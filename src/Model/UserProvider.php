<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum UserProvider: string
{
    case booxi = 'booxi';
    case saml = 'saml';
}
