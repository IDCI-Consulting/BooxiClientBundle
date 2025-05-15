<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum PriceVisibility: string
{
    case Show = 'Show';
    case Hidden = 'Hidden';
    case AskOnly = 'AskOnly';
}
