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
class SecondBitmask extends AbstractBitmask
{
    public const IS_ONE = 1 << 0; // =1

    //     omitted: 1 << 1 // =2
    public const IS_FOUR = 1 << 2; // =4

    public const IS_EIGHT = 1 << 3; // =8
}
