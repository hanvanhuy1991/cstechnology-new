<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Allow()
 * @method static static Deny()
 */
final class PromotionableType extends Enum
{
    const Allow = 1;
    const Deny = 0;
}
