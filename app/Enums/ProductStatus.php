<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Active()
 * @method static static Disable()
 */
final class ProductStatus extends Enum
{
    const Active = 1;
    const Disable = 0;
}
