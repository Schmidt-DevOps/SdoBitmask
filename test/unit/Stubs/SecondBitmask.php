<?php

namespace SdoBitmask\Tests\Stubs;

use SdoBitmask\AbstractBitmask;

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
    const IS_ONE = 1;
    const IS_FOUR = 4;
    const IS_EIGHT = 8;
}
