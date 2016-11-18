<?PHP // -*- mode:php -*-
// PHP >= 5.4
// inspired by https://github.com/joshbuchea/HEAD
//
// need to keep cetain order
// caching
// should values be limited to certain values?
// there should be a master array to union with that requires matching keys
// should be able to show doc info also
// should be organized by category or by tag type?
// because this involves "building", it will need to be cached

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
                           "article:author" => ""


                       ],
                        "tag" => [
                            "title" => "",
                            "base" => "",
                            "link" => ""
                        ]
                       ];


    //         "title" => "",
    //         "base" => "",
    //           //         "robots" => "",
    //
    //
    //         ///////////////////////////////////////
    //         // LINK
    //         ///////////////////////////////////////
    //         "canonical" => "",
    //         "shortlink" => "",
    //         "amphtml" => "",


    //         ///////////////////////////////////////
    //         // SOCIAL::FACEBOOK/INSTANT\ ARTICLES
    //         ///////////////////////////////////////
    //         "op:markup_version" => "",
    //         "fb:article_style" => "",

    //         ///////////////////////////////////////
    //         // SOCIAL::TWITTER
    //         ///////////////////////////////////////
    //         "twitter:card" => "",
    //         "twitter:site" => "",
    //         "twitter:creator" => ["" => "content"],
    //         "twitter:url" => "",
    //         "twitter:title" => "",
    //         "twitter:description" => "",
    //         "twitter:image" => "",

    //         ///////////////////////////////////////
    //         // SOCIAL::Google+ / Schema.org
    //         ///////////////////////////////////////

    //         ///////////////////////////////////////
    //         // SOCIAL::OEmbed
    //         ///////////////////////////////////////


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

    private function __construct () {
    }
    //
    private function __clone() {
    }
    //
    //
    public function addMeta($data) {
        $this->attributes["meta"] = array_intersect_key($data, $this->attributes["meta"]);
        //
        $this->elements["meta"] = array_map(array($this,"buildMeta"),$this->attributes["meta"],array_keys($this->attributes["meta"]));
    }
    private function buildMeta ($v, $k) {
        return "<meta name='".$k."' content='".$v."'>";
    }
    //
    public function addTag($data) {
        $this->attributes["tag"] = array_intersect_key($data, $this->attributes["tag"]);
        //
        $this->elements["tag"] = array_map(array($this,"buildTag"),$this->attributes["tag"],array_keys($this->attributes["tag"]));

    }
    private function buildTag ($v, $k) {
        return "<".$k.">".$v."</".$k.">";
    }

    //
    public function getMeta($key) {
        return $this->attributes[$key];
    }
    //
    public function dump() {
        var_dump($this->attributes["meta"]);
    }
    //
    public function getElements () {
        var_dump($this->elements);
    }
    //
    //
    //
    public static function Instance ()
    {
        if(self::$_instance == null) {

            self::$_instance = new MetaData();

        }
        return self::$_instance;
    }


}
