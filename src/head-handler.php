<?PHP // -*- mode:php -*-
// PHP >= 5.4
// inspired by https://github.com/joshbuchea/HEAD
// thanks to https://sourcemaking.com/design_patterns/prototype/php
//
// need to keep cetain order[<8;48;4m
// caching
// should values be limited to certain values?
// there should be a master array to union with that requires matching keys
// should be able to show doc info also
// should be organized by category or by tag type?
// because this involves "building", it will need to be cached
// if adding meta, need to verify that it exists in meta! (?)
// certain tags are self-closing!
// "sane" defaults?"

//[meta,name,content]
//[meta,http-equiv,content]

//
namespace GenerateHead;

abstract class Data
{
    protected $group;
    protected $attribute;


    //
    abstract function __clone();
    //
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }
}


// creates a basket for all element objects
class ElementPrototype extends Data {
    function __construct() {
        $this->group = new \stdClass;
    }
    function setTagGroup ($tag) {
        $this->group->name = $tag;
    }
    function __clone() {

    }
}

class LookUpTable
{
    protected $tagnames;
    protected $attributes;
    protected $value;

    private function __construct () {
        $this->$tagnames = ["meta","link","base","title"];

    }
}