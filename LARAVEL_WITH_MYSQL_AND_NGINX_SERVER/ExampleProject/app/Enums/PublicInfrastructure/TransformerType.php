<?php

namespace App\Enums\PublicInfrastructure;

enum TransformerType: string
{
  case HYBRID = 'hybrid';
  case THREE_PHASE = 'three_phase';
  case THREE_PHASE_AUTO = 'three_phase_auto';
}
