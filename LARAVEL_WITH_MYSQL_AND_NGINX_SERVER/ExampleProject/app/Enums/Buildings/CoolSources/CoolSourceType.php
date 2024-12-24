<?php

namespace App\Enums\Buildings\CoolSources;

enum CoolSourceType: string
{
  case HEAT_PUMP = 'heat_pump';
  case AIR_CONDITIONING = 'air_conditioning';
}
