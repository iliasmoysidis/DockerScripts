<?php

namespace App\Enums\Buildings;

enum InsulationMaterial: string
{
    case STONE_WOOL = 'stone_wool';
    case GLASS_WOOL = 'glass_wool';
    case NATURAL_WOOL = 'natural_wool';
    case POLYURETHANE = 'polyurethane';
    case EXPANDED_POLYSTERENE = 'expanded_polysterene';
    case EXTRUDED_POLYSTERENE = 'extruded_polysterene';
    case AEROGEL = 'aerogel';
    case DEFAULT = 'Default';
}
