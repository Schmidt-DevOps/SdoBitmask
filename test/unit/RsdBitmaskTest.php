<?php

namespace Sdo\Bitmask\Tests;

use Sdo\Bitmask\Tests\Stubs\FirstBitmask;

/**
 * SdoBitmask tests
 *
 * @category Bitmask
 * @package  SdoBitmask
 * @author   Rene Schmidt <rene@sdo.sh>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://sdo.sh/
 */
class SdoBitmaskTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Checks given bitmasks
     *
     * @return void
     */
    public function testInit(): void
    {
        $firstBitmask = new FirstBitmask(0);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_C));
    }

    /**
     * Checks whether given flags are set or not
     *
     * @return void
     * @throws \Exception
     */
    public function testSetFlag(): void
    {
        $firstBitmask = new FirstBitmask(0);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_C));

        $firstBitmask->setFlag(FirstBitmask::IS_A);
        $firstBitmask->setFlag(FirstBitmask::IS_C);

        $this->assertTrue($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertTrue($firstBitmask->is(FirstBitmask::IS_C));

        $firstBitmask->unsetFlag(FirstBitmask::IS_A);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertTrue($firstBitmask->is(FirstBitmask::IS_C));

        $this->assertSame(4, $firstBitmask->getBitmask());
    }

    /**
     * Checks whether a flag is illegal
     *
     * @return void
     */
    public function testSetIllegalFlag(): void
    {
        $firstBitmask = new FirstBitmask(0);

        try {
            $firstBitmask->setFlag(5);
            $this->fail("Exception expected!");
        } catch (\Exception $e) {
            $this->assertSame(1, $e->getCode());
        }
    }

    /**
     * Check whether negative bitmask detection actually works
     *
     * @return void
     */
    public function testSetNegativeBitmask(): void
    {
        try {
            new FirstBitmask(-2);
            $this->fail("Exception expected!");
        } catch (\Exception $e) {
            $this->assertSame(2, $e->getCode());
        }
    }
}
