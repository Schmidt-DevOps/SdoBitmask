<?php

namespace Sdo\Bitmask;

/**
 * Simple bitmask class to set bitmasks
 *
 * 1. checks whether a flag is positive or not
 * 2. checks whether a flag is power of two or not
 * 3. sets the flag and returns the bitmask as an int
 * 4. gets the actual bitmask as an int
 *
 * @category Bitmask
 * @package  SdoBitmask
 * @author   Stefanie Schmidt <stefanie+_gth@sdo.sh>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://sdo.sh/
 */
abstract class AbstractBitmask
{
    /**
     * @var int Bitmask in int representation
     */
    protected $bitmask = 0;

    /**
     * Constructor
     *
     * @param int $bitmask Bitmask in int representation
     *
     * @throws \Exception
     */
    public function __construct(int $bitmask)
    {
        if ($bitmask < 0) {
            throw new \Exception("Bitmask must not be negative!", 2);
        }
        $this->bitmask = $bitmask;
    }

    /**
     * Getter for bitmask
     *
     * @return int
     */
    public function getBitmask(): int
    {
        return $this->bitmask;
    }

    /**
     * Check whether a flag is set in the bitmask or not
     *
     * @param int $flag Bitmask flag
     *
     * @return bool
     */
    public function is(int $flag): bool
    {
        return ($this->bitmask & $flag) === $flag;
    }

    /**
     * Set flag
     *
     * @param int  $flag Bitmask flag
     * @param bool $set  Set if true otherwise unset
     *
     * @return self
     * @throws \Exception
     */
    public function setFlag(int $flag, bool $set = true): self
    {
        if ($flag != 0 && !$this->isPowerOfTwo($flag)) {
            throw new \Exception("Illegal flag.", 1);
        }

        if ($set) {
            $this->bitmask |= $flag;
        } else {
            $this->bitmask &= ~$flag;
        }

        return $this;
    }

    /**
     * Unset flag
     *
     * @param int $flag Bitmask flag
     *
     * @return self
     * @throws \Exception
     */
    public function unsetFlag(int $flag): self
    {
        return $this->setFlag($flag, false);
    }

    /**
     * Checks whether a flag is a power of two or not
     *
     * @param int $flag Flag of bitmask
     *
     * @return bool
     */
    public function isPowerOfTwo(int $flag): bool
    {
        return $flag > 0 && !($flag & ($flag - 1));
    }
}
