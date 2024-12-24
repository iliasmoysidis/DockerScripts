<?php

namespace App\Enums\Buildings\HeatSources;

enum HeatSourceType: string
{
    case BOILER = 'boiler';
    case HEAT_PUMP = 'heat_pump';
    case AIR_CONDITIONING = 'air_conditioning';
    case RESISTIVE = 'resistive';
}
