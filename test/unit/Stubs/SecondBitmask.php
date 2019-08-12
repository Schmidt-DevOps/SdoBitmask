<?php

namespace Sdo\Bitmask\Tests\Stubs;

use Sdo\Bitmask\AbstractBitmask;

/**
 * Simple class with constant bitmask flags
 * For testing only
 *
 * @category Bitmask
 * @package  SdoBitmaskTest
 * @author   Stefanie Schmidt <stefanie+_gth@sdo.sh>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://sdo.sh/
 */
class SecondBitmask extends AbstractBitmask
{
    const IS_ONE = 1 << 0; // =1
    //     omitted: 1 << 1 // =2
    const IS_FOUR = 1 << 2; // =4
    const IS_EIGHT = 1 << 3; // =8
}
