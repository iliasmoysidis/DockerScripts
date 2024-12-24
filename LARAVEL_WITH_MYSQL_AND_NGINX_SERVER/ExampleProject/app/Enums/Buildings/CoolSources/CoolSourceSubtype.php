<?php

namespace App\Enums\Buildings\CoolSources;

enum CoolSourceSubtype: string
{
  case AIR2AIR = 'air2air';
  case AIR2WATER = 'air2water';
  case BASIC = 'basic';

  public static function valuesOfType(CoolSourceType $type)
  {
    switch ($type) {
      case CoolSourceType::HEAT_PUMP:
        return [self::AIR2AIR->value, self::AIR2WATER->value];
      case CoolSourceType::AIR_CONDITIONING:
        return [self::BASIC->value];
      default:
        return [];
    }
  }
}
