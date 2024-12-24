<?php

namespace App\Enums\Buildings\Photovoltaics;

enum BuildingPhotovoltaicMounting: string
{
  case GROUND = 'ground';
  case ROOFSLANTED = 'roofslanted';
  case FACADE = 'facade';
  case ROOFFLAT = 'roofflat';
  case ZAPPAFACADE = 'zappafacade';
  // case BUILDING_INTEGRATED = 'building_integrated';
}
