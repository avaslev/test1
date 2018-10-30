<?php

require_once 'Line.php';
require_once 'Beetle.php';

$line = new Line();
$line->setRocks(8);
$line->addBeetles(1);
$line->displayLastBeetle();

$line->setRocks(8);
$line->addBeetles(2);
$line->displayLastBeetle();

$line->setRocks(8);
$line->addBeetles(3);
$line->displayLastBeetle();


$line->setRocks(3999);
$line->addBeetles(1500);
$line->displayLastBeetle();

$line->setRocks(3999999);
$line->addBeetles(1500000);
$line->displayLastBeetle();

$line->setRocks(3999999999);
$line->addBeetles(2500000000);
$line->displayLastBeetle();