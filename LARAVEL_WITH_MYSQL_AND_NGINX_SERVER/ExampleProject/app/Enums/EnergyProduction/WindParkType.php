<?php

namespace App\Enums\EnergyProduction;

enum WindParkType: string
{
  case HORIZONTAL_AXIS = 'horizontal_axis';
  case VERTICAL_AXIS = 'vertical_axis';
  case GEARED = 'geared';
}
