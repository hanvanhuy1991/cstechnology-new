<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Master()
 * @method static static Normal()
 */
final class VariantType extends Enum
{
    const Master = 1;
    const Normal = 0;
}
