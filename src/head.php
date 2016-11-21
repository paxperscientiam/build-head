<?PHP // -*- mode:php -*-
// each element needs to be its on object

use Moose\EasyHead\GenerateHead;
use FlatDB\FlatDB;

include "../vendor/autoload.php";
$db = new FlatDB(__DIR__ . '/data');

$elementProto = new GenerateHead\ElementPrototype();

$el1 = clone $elementProto;
$el1->setTagGroup("meta");

$el1->setAttribute(["google"]);

var_dump($el1);