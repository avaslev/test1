<?php

/**
 * Class Beetle
 */
class Beetle
{
    const LEFT_SIDE = 'left_side';
    const RIGHT_SIDE = 'right_side';

    /**
     * @var
     */
    public $leftRocks;
    // справа всегда камней больше
    /**
     * @var
     */
    public $rightRocks;

    /**
     * @var int
     */
    public $level = 0;
    /**
     * @var bool
     */
    public $leftBeetle = false;
    /**
     * @var bool
     */
    public $rightBeetle = false;

    /**
     * @return null|String
     */
    public function getRockSide(): ?String
    {
        if (!$this->rightBeetle) {
            return self::RIGHT_SIDE;
        }
        if (!$this->leftBeetle) {
            return self::LEFT_SIDE;
        }
        return null;
    }

    /**
     * @param string $side
     * @return int
     */
    public function getRockBySide(string $side): int
    {
        if ($side == self::LEFT_SIDE) {
            return $this->leftRocks;
        } elseif ($side == self::RIGHT_SIDE) {
            return $this->rightRocks;
        }
    }

    /**
     * @return int
     */
    public function getMaxRocks(): int
    {
        return $this->getRockBySide($this->getRockSide());
    }

    /**
     * @param string $side
     */
    public function setBeetleToSide(string $side): void
    {
        if ($side == self::LEFT_SIDE) {
            $this->leftBeetle = true;
        } elseif ($side == self::RIGHT_SIDE) {
            $this->rightBeetle = true;
        }
    }
}