<?php

namespace App\Enums\Buildings\HeatSources;

enum HeatSourceSubtype: string
{
  case NGAS = 'ngas';
    // case BIOMASS = 'biomass';
  case OIL = 'oil';
  case AIR2AIR = 'air2air';
  case AIR2WATER = 'air2water';
  case BASIC = 'basic';

  public static function valuesOfType(HeatSourceType $type)
  {
    switch ($type) {
      case HeatSourceType::BOILER:
        // return [self::NGAS->value, self::BIOMASS->value, self::OIL->value];
        return [self::NGAS->value, self::OIL->value];
      case HeatSourceType::HEAT_PUMP:
        return [self::AIR2AIR->value, self::AIR2WATER->value];
      case HeatSourceType::AIR_CONDITIONING:
      case HeatSourceType::RESISTIVE:
        return [self::BASIC->value];
      default:
        return [];
    }
  }
}
