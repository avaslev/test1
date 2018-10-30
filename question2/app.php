<?php

require_once 'Line.php';
require_once 'Beetle.php';

$line = new Line(8);
$line->addBeetles(1);
echo $line->lastBeetle->leftRocks . ',' . $line->lastBeetle->rightRocks . PHP_EOL;

$line = new Line(8);
$line->addBeetles(2);
echo $line->lastBeetle->leftRocks . ',' . $line->lastBeetle->rightRocks . PHP_EOL;

$line = new Line(8);
$line->addBeetles(3);
echo $line->lastBeetle->leftRocks . ',' . $line->lastBeetle->rightRocks . PHP_EOL;

$line = new Line(8);
$line->addBeetles(4);
echo $line->lastBeetle->leftRocks . ',' .$line->lastBeetle->rightRocks . PHP_EOL;

$line = new Line(3999);
$line->addBeetles(1500);
echo $line->lastBeetle->leftRocks . ',' .$line->lastBeetle->rightRocks . PHP_EOL;

// дальше работает долго
//$line = new Line(3999999);
//$line->addBeetles(1500000);
//echo $line->lastBeetle->leftRocks . ',' .$line->lastBeetle->rightRocks . PHP_EOL;

//$line = new Line(3999999999);
//$line->addBeetles(2500000000);
//echo $line->lastBeetle->leftRocks . ',' .$line->lastBeetle->rightRocks . PHP_EOL;