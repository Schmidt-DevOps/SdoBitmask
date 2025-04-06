<?php

namespace Sdo\Bitmask\Tests\Stubs;

use Sdo\Bitmask\AbstractBitmask;

/**
 * Simple class with constant bitmask flags
 * For testing only
 *
 * @category Bitmask
 *
 * @see     https://sdo.sh/
 */
class FirstBitmask extends AbstractBitmask
{
    public const IS_A = 1 << 0; // =1

    public const IS_B = 1 << 1; // =2

    public const IS_C = 1 << 2; // =4
}
