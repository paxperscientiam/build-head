<?PHP // -*- mode:php -*-
// PHP >= 5.4
// inspired by https://github.com/joshbuchea/HEAD
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

//
namespace GenerateHead;

class MetaData
{
    private static $_instance = null;
    // default values
    //<meta http-equiv="x-ua-compatible" content="ie=edge">
    public $elements = [];
    public $attributes =
                       ["meta" => [
                           "charset" => "utf-8",
                           "x-ua-compatible" => "o",
                           "viewport" => "width=device-width, initial-scale=1",
                           "http-equiv:Content-Security-Policy" => "",
                           "application-name" => "",
                           "description" => "",
                           "robots" => "",
                           "googlebot" => "",
                           "google-site-verification" => "",
                           "generator" => "",
                           "subject" => "",
                           "abstract" => "",
                           "rating" => "",
                           "referrer" => "",
                           "format-detection" => "",
                           ///////////////////////////////////////
                           // ROBOTS
                           ///////////////////////////////////////
                           "robots" => "",
                           "googlebot" => "",
                           ///////////////////////////////////////
                           // SOCIAL::FACEBOOK/OPEN\ GRAPH
                           ///////////////////////////////////////
                           "fb:app_id" => "",
                           "og:url" => "",
                           "og:type" => "",
                           "og:title" => "",
                           "og:image" => "",
                           "og:description" => "",
                           "og:site_name" => "",
                           "og:locale" => "",
                           "article:author" => "",
                           ///////////////////////////////////////
                           // SOCIAL::FACEBOOK/INSTANT\ ARTICLES
                           ///////////////////////////////////////
                           "op:markup_version" => "",
                           "fb:article_style" => "",
                           //
                           ///////////////////////////////////////
                           // SOCIAL::TWITTER
                           ///////////////////////////////////////
                           "twitter:card" => "",
                           "twitter:site" => "",
                           "twitter:creator" => ["" => "content"],
                           "twitter:url" => "",
                           "twitter:title" => "",
                           "twitter:description" => "",
                           "twitter:image" => "",


                           //         ///////////////////////////////////////
                           //         // SOCIAL::Google+ / Schema.org
                           //         ///////////////////////////////////////

                           //         ///////////////////////////////////////
                           //         // SOCIAL::OEmbed
                           //         ///////////////////////////////////////
                           ///////////////////////////////////////
                           // Microsoft Internet Explorer
                           ///////////////////////////////////////
                           "skype_toolbar" => "skype_toolbar_parser_compatible",
                           "msapplication-tap-highlight" => "no",
                           "application-name" => "",
                           "msapplication-tooltip" => "",
                           "msapplication-starturl" => "",
                           "msapplication-config" => "",
                           "msapplication-allowDomainApiCalls" => "",
                           "msapplication-allowDomainMetaTags" => "",
                           "msapplication-badge" => "",
                           "msapplication-navbutton-color" => "",
                           "msapplication-notification" => "",
                           "msapplication-task" => "",
                           "msapplication-task-separator" => "",
                           "msapplication-TileColor" => "",
                           "msapplication-TileImage" => "",
                           "msapplication-window" => ""
                           //
                           ///////////////////////////////////////
                           // App Links
                           ///////////////////////////////////////



                       ],
                        "tag" => [
                            "title" => "",
                            "base" => ""
                        ],

                        "link" => [
                            ///////////////////////////////////////
                            // Apple iOS
                            ///////////////////////////////////////
                            "apple-touch-icon-precomposed" => [],
                            "apple-touch-icon" => [],
                            ///////////////////////////////////////
                            // Apple Safari
                            ///////////////////////////////////////
                            "mask-icon" => [],
                            ///////////////////////////////////////
                            // Google Chrome
                            ///////////////////////////////////////
                            //
                            ///////////////////////////////////////
                            // Favicons
                            ///////////////////////////////////////

                            // CSS
                            "stylesheet" => []
                        ]
                       ];

    //           //
    //
    //
    //         ///////////////////////////////////////
    //         // LINK
    //         ///////////////////////////////////////
    //         "canonical" => "",
    //         "shortlink" => "",
    //         "amphtml" => "",




    //         ///////////////////////////////////////
    //         // PLATFORM:iOS
    //         ///////////////////////////////////////
    //         "apple-itunes-app" => "",
    //         "format-detection" => "",
    //         "apple-mobile-web-app-capable" => "",
    //         "apple-mobile-web-app-status-bar-style" => "",
    //         "apple-mobile-web-app-title" => "",

    //         ///////////////////////////////////////
    //         // PLATFORM:Microsoft Internet Explorer
    //         ///////////////////////////////////////
    //         "x-ua-compatible" => "ie=edge",
    //         "cleartype" => "",
    //         "msapplication-tap-highlight" => "",
    //         "application-name" => "",
    //         "msapplication-tooltip" => "",
    //         "msapplication-starturl" => "",
    //         "msapplication-config" => ""
    //     ];

    private $_attributes;

    private function __construct () {
        $this->_attributes = $this->attributes;
    }
    //
    private function __clone() {
    }
    //
    //
    public function addMeta($data) {
        $this->_attributes["meta"] = array_intersect_key($data, $this->_attributes["meta"]);
        //
        $this->elements["meta"] = array_map(array($this,"buildMeta"),$this->_attributes["meta"],array_keys($this->_attributes["meta"]));
    }
    public function addTag($data) {
        $this->_attributes["tag"] = array_intersect_key($data, $this->_attributes["tag"]);
        //
        $this->elements["tag"] = array_map(array($this,"buildTag"),$this->_attributes["tag"],array_keys($this->_attributes["tag"]));
    }
    //
    public function addLink($data) {
        $this->_attributes["link"] = array_intersect_key($data, $this->_attributes["link"]);
        //
        foreach ($this->_attributes["link"] as $v => $k) {
            foreach ($k as $val) {
                if ($v === "stylesheet") {
                    $this->elements["link"][] = "<link rel='".$v."' href='".$val."'>";
                } else {
                    $this->elements["link"][] = "<link name='".$v."' href='".$val."'>";
                }
            }
        }

        //  foreach ($this->_attributes["link"] as $key => $l) {
        //             var_dump($key);
        //         }
        //  $this->elements["link"] = array_map(array($this,"buildLink"),$this->_attributes["link"],array_keys($this->_attributes["link"]));
    }
    private function buildLink ($v, $k) {
        foreach ($v as $j) {

        }
        //return array_map(
        //        return "<link name='".$k."' href='".$v."'>";
    }
    //
    //
    private function buildMeta ($v, $k) {
        return "<meta name='".$k."' content='".$v."'>";
    }
    //
    //
    private function buildTag ($v, $k) {
        if ($k === "title") {
            return "<".$k.">".$v."</".$k.">";
        } else if ($k === "base") {
            return "<".$k." href='".$v."'>";
        }
    }
    //
    public function getElements ($key=null) {
        if ($key !== null) {
            var_dump($this->elements[$key]);
        } else {
            var_dump($this->elements);
        }
    }
    //
    //
    //
    ///////////////////////////
    // DUMP FUNCTIONS
    ///////////////////////////
    public function getMeta($key) {
        return $this->_attributes[$key];
    }
    //
    public function dumpData($k = null) {
        if ($k !== null) {
            var_dump($this->_attributes[$k]);
        } else {
            var_dump($this->_attributes);
        }
    }
    //
    public function dumpKeys($k = null) {
        if ($k !== null) {
            var_dump($this->attributes[$k]);
        } else {
            var_dump($this->attributes);
        }
    }
    //
    public static function Instance ()
    {
        if(self::$_instance == null) {

            self::$_instance = new MetaData();

        }
        return self::$_instance;
    }


}
