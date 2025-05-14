<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum PriceTax: string
{
    case None = 'None';
    case Included = 'Included';
    case Excluded = 'Excluded';
}