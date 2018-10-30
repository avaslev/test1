<?php

/**
 * Class Line
 */
class Line
{
    /**
     * @var int
     */
    public $currentBeetleSides = 0;
    /**
     * @var array
     */
    public $beetleSides = [];

    /** @var Beetle */
    public $lastBeetle;

    /**
     * @param int $totalRocks
     * @throws Exception
     */
    public function setRocks(int $totalRocks): void
    {
        if ($totalRocks > 4000000000) {
            throw new Exception("Камней больше 4 млрд");
        }
        $this->beetleSides = [$totalRocks => 1];
        $this->currentBeetleSides = $totalRocks;
    }


    /**
     * @param int $beetlesCount
     * @throws Exception
     */
    public function addBeetles(int $beetlesCount)
    {

        if ($beetlesCount > $this->currentBeetleSides) {
            throw new InvalidArgumentException('Жуков больше чем камней');
        }

        while ($beetlesCount > 0) {

            $numBeetle = $this->beetleSides[$this->currentBeetleSides];
            if ($numBeetle > $beetlesCount) {
                $numBeetle = $beetlesCount;
            }

            $beetle = new Beetle();
            $beetle->setBeetleSides($this->currentBeetleSides);

            $this->addBeetleToBeetleSides($beetle, $numBeetle);
            $this->beetleSides[$this->currentBeetleSides] -= $numBeetle;
            $beetlesCount -= $numBeetle;
            $this->lastBeetle = $beetle;
            $this->updateCurrentBeetleSides();
        }

    }

    public function displayLastBeetle(): void
    {
        echo $this->lastBeetle->leftRocks . ',' . $this->lastBeetle->rightRocks . PHP_EOL;
    }

    /**
     * @param Beetle $beetle
     * @param int $count
     */
    private function addBeetleToBeetleSides(Beetle $beetle, int $count): void
    {
        if (!isset($this->beetleSides[$beetle->leftRocks])) {
            $this->beetleSides[$beetle->leftRocks] = $count;
        } else {
            $this->beetleSides[$beetle->leftRocks] += $count;
        }

        if (!isset($this->beetleSides[$beetle->rightRocks])) {
            $this->beetleSides[$beetle->rightRocks] = $count;
        } else {
            $this->beetleSides[$beetle->rightRocks] += $count;
        }
    }


    /**
     *
     */
    private function updateCurrentBeetleSides(): void
    {
        if ($this->beetleSides[$this->currentBeetleSides] > 0) {
            return;
        }

        unset ($this->beetleSides[$this->currentBeetleSides]);
        $this->currentBeetleSides = max(array_keys($this->beetleSides));
    }
}