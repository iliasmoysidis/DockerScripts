<?php

namespace App\Enums\Buildings;

enum WaterStorageTankType: string
{
    case COPPER = 'copper';
    case STEEL = 'steel';
    case IRON = 'iron';
    case PINK_WALL_INTEGRATED = 'pink_wall_integrated';
    case PINK_WALL_MOUNTED = 'pink_wall_mounted';
    case DEFAULT = 'Default';
}
