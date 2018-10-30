<?php

/**
 * Class Beetle
 */
class Beetle
{

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
     * @param int $count
     */
    public function setBeetleSides(int $count): void
    {
        $this->leftRocks = intdiv($count - 1, 2);
        $this->rightRocks = $this->leftRocks + ($count - 1) % 2;
    }
}