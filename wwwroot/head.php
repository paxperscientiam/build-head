<?PHP // -*- mode:php -*-

include "head-handler.php";
use GenerateHead\MetaData;

$head = MetaData::Instance();
$head->addMeta([
    "x-ua-compatible" => "as",
    "viewport" => "alksdjjlks",
    "article:author" => "Jesus Christ Superstar"
]);

$head->addTag([
    "title" => "A King has His Reign",
    "base" => "example.com/base/",
]);

$head->addLink([
    "apple-touch-icon-precomposed" => ["path/to/apple-touch-icon.png"],
    "apple-touch-icon" => ["path/to/icon@57.png",
                           "path/to/icon@72.png",
                           "path/to/icon@92.png"],
    "stylesheet" => ["app.css","vendor-1.css","vendor-2.css"]
]);

$head->getElements("meta");

// Get element values added, type can be specified
// option to specify which tags, or use all (with values)
//$meta->dumpData("tag");


// Get full list of available eleme$thisnt attributes
//$meta->dumpKeys();

die();
