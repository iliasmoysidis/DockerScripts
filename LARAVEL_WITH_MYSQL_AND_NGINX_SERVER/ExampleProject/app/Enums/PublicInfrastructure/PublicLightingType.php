<?php

namespace App\Enums\PublicInfrastructure;

enum PublicLightingType: string
{
  case LED = 'led';
  case SMART = 'smart';
}
