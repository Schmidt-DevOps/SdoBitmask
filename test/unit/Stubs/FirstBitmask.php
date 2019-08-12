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
class FirstBitmask extends AbstractBitmask
{
    const IS_A = 1 << 0; // =1
    const IS_B = 1 << 1; // =2
    const IS_C = 1 << 2; // =4
}
