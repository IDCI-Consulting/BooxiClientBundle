<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum SurveyType: string
{
    case None = 'None';
    case Single = 'Single';
    case Multiple = 'Multiple';
    case Complex = 'Complex';
}
