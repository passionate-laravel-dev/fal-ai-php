<?php

namespace Passionatelaraveldev\FalAI\Enums;

use Passionatelaraveldev\FalAI\Concerns\HasEnumConvert;

enum AspectRatioEnum: string
{
    use HasEnumConvert;

    case RATIO_16_9 = '16:9';
    case RATIO_1_1 = '1:1';
    case RATIO_9_16 = '9:16';
}
