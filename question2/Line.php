<?php

/**
 * Class Line
 */
class Line
{
    /**
     * @var int
     */
    public $currentBeetleLevel = 0;
    /**
     * @var array
     */
    public $beetleLevels = [];

    /**
     * @var int
     */
    public $totalRocks = 0;

    /** @var Beetle */
    public $lastBeetle;

    /**
     * Line constructor.
     * @param int $totalRocks
     * @throws Exception
     */
    public function __construct(int $totalRocks)
    {
        if ($totalRocks > 4000000000) {
            throw new Exception("Камней больше 4 млрд");
        }

        $this->totalRocks = $totalRocks;
    }

    /**
     * @param int $count
     * @throws Exception
     */
    public function addBeetles(int $count)
    {
        if ($count > $this->totalRocks) {
            throw new InvalidArgumentException('Жуков больше чем камней');
        }
        for ($i = 0; $i < $count; $i++) {
            $this->addBeetle();
        }

    }

    /**
     * @throws Exception
     */
    private function addBeetle()
    {
        $beetle = new Beetle();
        $rocks = $this->totalRocks;

        if (!empty($this->beetleLevels)) {
            $parentBeetle = $this->findMaxPlaceBeetle();
            $beetle->level = $parentBeetle->level + 1;
            $rocks = $parentBeetle->getMaxRocks();
            $parentBeetle->setBeetleToSide($parentBeetle->getRockSide());
        }

        $beetle = $this->setBeetleSides($beetle, $rocks);

        $this->addBeetleToLevels($beetle);
        $this->lastBeetle = $beetle;
    }

    /**
     * @param Beetle $beetle
     * @param int $rocks
     * @return Beetle
     */
    private function setBeetleSides(Beetle $beetle, int $rocks): Beetle
    {
        $beetle->leftRocks = intdiv($rocks - 1, 2);
        $beetle->rightRocks = $beetle->leftRocks + ($rocks - 1) % 2;
        return $beetle;
    }

    /**
     * @return Beetle|null
     * @throws Exception
     */
    private function findMaxPlaceBeetle()
    {
        if (!isset($this->beetleLevels[$this->currentBeetleLevel])) {
            throw new Exception('Что то сломалоcь');
        }
        /** @var Beetle|null $maxPlaceBeetle */
        $maxPlaceBeetle = null;
        /** @var Beetle $beetleItem */
        foreach ($this->beetleLevels[$this->currentBeetleLevel] as $beetleItem) {
            if (!is_null($beetleItem->getRockSide())) {
                if (is_null($maxPlaceBeetle)
                    || $maxPlaceBeetle->getMaxRocks() < $beetleItem->getMaxRocks()) {
                    $maxPlaceBeetle = $beetleItem;
                }
            }
        }

        if (!$maxPlaceBeetle) {
            unset($this->beetleLevels[$this->currentBeetleLevel]);
            ++$this->currentBeetleLevel;
            echo 'level up to ' . $this->currentBeetleLevel . PHP_EOL;
            return $this->findMaxPlaceBeetle();
        }

        return $maxPlaceBeetle;
    }

    /**
     * @param Beetle $beetle
     */
    private function addBeetleToLevels(Beetle $beetle): void
    {
        if (!isset($this->beetleLevels[$beetle->level])) {
            $this->beetleLevels[$beetle->level] = [];
        }
        $this->beetleLevels[$beetle->level][] = $beetle;
    }
}