<?php

namespace Passionatelaraveldev\FalAI\Enums\Veo3;

use Passionatelaraveldev\FalAI\Concerns\HasEnumConvert;

enum DurationEnum: string
{
    use HasEnumConvert;

    case DURATION_8S = '8s';
}
