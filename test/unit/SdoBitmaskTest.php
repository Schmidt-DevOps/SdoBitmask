<?php

namespace Sdo\Bitmask\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Sdo\Bitmask\Tests\Stubs\FirstBitmask;

/**
 * SdoBitmask tests
 *
 * @category Bitmask
 *
 * @see     https://sdo.sh/
 */
class SdoBitmaskTest extends TestCase
{
    /**
     * Checks given bitmasks
     *
     * @throws Exception
     */
    public function testInit(): void
    {
        $firstBitmask = new FirstBitmask(0);

        self::assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_C));
    }

    /**
     * Checks whether given flags are set or not
     *
     * @throws Exception
     */
    public function testSetFlag(): void
    {
        $firstBitmask = new FirstBitmask(0);

        self::assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_C));

        $firstBitmask->setFlag(FirstBitmask::IS_A);
        $firstBitmask->setFlag(FirstBitmask::IS_C);

        self::assertTrue($firstBitmask->is(FirstBitmask::IS_A));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        self::assertTrue($firstBitmask->is(FirstBitmask::IS_C));

        $firstBitmask->unsetFlag(FirstBitmask::IS_A);

        self::assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        self::assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        self::assertTrue($firstBitmask->is(FirstBitmask::IS_C));

        self::assertSame(4, $firstBitmask->getBitmask());
    }

    /**
     * Checks whether a flag is illegal
     *
     * @throws Exception
     */
    public function testSetIllegalFlag(): void
    {
        $firstBitmask = new FirstBitmask(0);

        try {
            $firstBitmask->setFlag(5);
            self::fail("Exception expected!");
        } catch (Exception $exception) {
            self::assertSame(1, $exception->getCode());
        }
    }

    /**
     * Check whether negative bitmask detection actually works
     */
    public function testSetNegativeBitmask(): void
    {
        try {
            new FirstBitmask(-2);
            self::fail("Exception expected!");
        } catch (Exception $exception) {
            self::assertSame(2, $exception->getCode());
        }
    }

    /**
     * Check idempotency of setFlag() I guess, cannot remember really what I was getting at here.
     *
     * @throws Exception
     */
    public function testSetFlagIdempotency(): void
    {
        $firstBitmask = new FirstBitmask(0);

        $firstBitmask->setFlag(FirstBitmask::IS_C);
        self::assertSame(4, $firstBitmask->getBitmask());

        $firstBitmask->setFlag(FirstBitmask::IS_C);
        self::assertSame(4, $firstBitmask->getBitmask());
    }
}
