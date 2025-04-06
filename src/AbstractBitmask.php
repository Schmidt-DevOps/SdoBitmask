<?php

namespace Sdo\Bitmask;

use Exception;

/**
 * Simple bitmask class to set bitmasks
 *
 * 1. checks whether a flag is positive or not
 * 2. checks whether a flag is power of two or not
 * 3. sets the flag and returns the bitmask as an int
 * 4. gets the actual bitmask as an int
 *
 * @category Bitmask
 *
 * @see     https://sdo.sh/
 */
abstract class AbstractBitmask
{
    /** @var int Bitmask in int representation */
    protected int $bitmask;

    /**
     * Constructor
     *
     * @param int $bitmask Bitmask in int representation
     *
     * @throws Exception
     */
    public function __construct(int $bitmask)
    {
        if ($bitmask < 0) {
            throw new Exception("Bitmask must not be negative!", 2);
        }

        $this->bitmask = $bitmask;
    }

    /**
     * Getter for bitmask
     */
    public function getBitmask(): int
    {
        return $this->bitmask;
    }

    /**
     * Check whether a flag is set in the bitmask or not
     *
     * @param int $flag Bitmask flag
     */
    public function is(int $flag): bool
    {
        return ($this->bitmask & $flag) === $flag;
    }

    /**
     * Set flag
     *
     * @param int $flag Bitmask flag
     * @param bool $set Set if true otherwise unset
     *
     * @throws Exception
     */
    public function setFlag(int $flag, bool $set = true): self
    {
        if (0 != $flag && !$this->isPowerOfTwo($flag)) {
            throw new Exception("Illegal flag.", 1);
        }

        if ($set) {
            $this->bitmask |= $flag;

            return $this;
        }

        $this->bitmask &= ~$flag;

        return $this;
    }

    /**
     * Unset flag
     *
     * @param int $flag Bitmask flag
     *
     * @throws Exception
     */
    public function unsetFlag(int $flag): self
    {
        return $this->setFlag($flag, false);
    }

    /**
     * Checks whether a flag is a power of two or not
     *
     * @param int $flag Flag of bitmask
     */
    public function isPowerOfTwo(int $flag): bool
    {
        return $flag > 0 && ($flag & ($flag - 1)) === 0;
    }
}
