<?php

namespace IDCI\Bundle\BooxiClientBundle\Model;

enum PaymentError: string
{
    case PaymentAlreadyCollected = 'PaymentAlreadyCollected';
    case PaymentWasCancelled = 'PaymentWasCancelled';
}