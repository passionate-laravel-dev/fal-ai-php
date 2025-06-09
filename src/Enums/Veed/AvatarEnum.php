<?php

namespace Passionatelaraveldev\FalAI\Enums\Veed;

use Passionatelaraveldev\FalAI\Concerns\HasEnumConvert;

enum AvatarEnum: string
{
    use HasEnumConvert;

    case EMILY_PRIMARY = "emily_primary";
    case EMILY_SIDE = "emily_side";
    case MARCUS_PRIMARY = "marcus_primary";
    case MARCUS_SIDE = "marcus_side";
    case AISHA_WALKING = "aisha_walking";
    case ELENA_PRIMARY = "elena_primary";
    case ELENA_SIDE = "elena_side";
    case ANY_MALE_PRIMARY = "any_male_primary";
    case ANY_FEMALE_PRIMARY = "any_female_primary";
    case ANY_MALE_SIDE = "any_male_side";
    case ANY_FEMALE_SIDE = "any_female_side";

    public function label(): string
    {
        return match ($this) {
            self::EMILY_PRIMARY => "Emily Primary",
            self::EMILY_SIDE => "Emily Side",
            self::MARCUS_PRIMARY => "Marcus Primary",
            self::MARCUS_SIDE => "Marcus Side",
            self::AISHA_WALKING => "Aisha Walking",
            self::ELENA_PRIMARY => "Elena Primary",
            self::ELENA_SIDE => "Elena Side",
            self::ANY_MALE_PRIMARY => "Any Male Primary",
            self::ANY_FEMALE_PRIMARY => "Any Female Primary",
            self::ANY_MALE_SIDE => "Any Male Side",
            self::ANY_FEMALE_SIDE => "Any Female Side",
        };
    }
}

