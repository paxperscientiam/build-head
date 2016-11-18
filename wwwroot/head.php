<?PHP // -*- mode:php -*-

include "head-handler.php";
use GenerateHead\MetaData;

$meta = MetaData::Instance();
$meta->addMeta([
    "x-ua-compatible" => "as",
    "viewport" => "alksdjjlks",
    "article:author" => "Jesus Christ Superstar"
]);

$meta->addTag([
    "title" => "A King has His Reign"
]);


// if adding meta, need to verify that it exists in meta!
// should be able to take array as key
//<meta name="application-name" content="Application Name">
// user puts application-name and the name, not "content" and "name" keys
// certain tags must not be closed

$meta->getElements();
