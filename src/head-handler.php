<?PHP namespace Moose\Easyhead; // -*- mode:php -*-
// inspired by https://github.com/joshbuchea/HEAD
// thanks to https://sourcemaking.com/design_patterns/prototype/php
//
// need to keep cetain order
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

trait GetSet {
    public function getData() {
        var_dump($this->data["pair"]);

    }
    public function setData($a) {
        $this->data["pair"] = $a + $this->template["pair"];
    }
}
//
//
// singleton
class Meta
{
    use GetSet;

    private static $_instance = null;
    //
    private $headers = [];
    private $data = [];
    private $template =[];

    public function __construct () {
        $this->data["pair"] = [];
        self::setHeaders();
        self::setAttr();


        //     "name",
        //             "http-equiv",
        //             "content"
        //         ]);

        //         // die(
        //        );

        // var_dump($this->table->meta["headers"]["name"]);
        //  $this->table->meta["data"] = [
        //             ["viewport","",""]
        //         ];

        //var_dump($this->table->meta["data"]);
        // die();
        //         $this->table->meta->data = [
        //             "charset" => "utf-8",
        //             "attributes" => "name,content,aux",
        //             "values" =>
        //             [
        //                 "viewport" => "width=device-width, initial-scale=1.0",
        //                 "application-name" => "",
        //                 "description" => "",
        //                 "robots" => "",
        //                 "googlebot" => "",
        //                 "google" => "",
        //                 "google-site-verification" => "",
        //                 "generator" => "",
        //                 "subject" => "",
        //                 "abstract" => "",
        //                 "url" => "",
        //                 "directory" => "",
        //                 "rating" => "",
        //                 "format-detection" => "",
        //                 "ICBM" => "",
        //                 "geo.position" => "",
        //                 "geo.region" => "",
        //                 "geo.placename" => "",
        //                 //
        //                 ////////////////////
        //                 //// TWITTER
        //                 ///////////////////
        //                 "twitter:card" => "",
        //                 "twitter:site" => "",
        //                 "twitter:creator" => "",
        //                 "twitter:url" => "",
        //                 "twitter:title" => "",
        //                 "twitter:description" => "",
        //                 "twitter:image" => "",
        //                 //
        //                 ////////////////////
        //                 //// Apple iOS
        //                 ///////////////////
        //                 "apple-itunes-app" => "",
        //                 "format-detection" => "",
        //                 "apple-mobile-web-app-capable" => "",
        //                 "apple-mobile-web-app-status-bar-style" => "",
        //                 "apple-mobile-web-app-title" => "",
        //                 "apple-itunes-app" => ""


        //             ],
        //             "attributes" => "http-equiv,content,aux",
        //             "values" =>
        //             [
        //                 "x-ua-compatible" => "",
        //                 "Content-Security-Policy" => "",
        //                 "x-dns-prefetch-control" => "",
        //                 "set-cookie" => "",
        //                 "Window-Target" => "",
        //                 //
        //                 //// Microsoft Internet Explorer
        //                 "cleartype" => ""
        //             ],
        //             "attributes" => "property,content,aux",
        //             "values" =>
        //             [
        //                 "fb:app_id" => "",
        //                 "og:url" => "",
        //                 "og:type" => "",
        //                 "og:title" => "",
        //                 "og:image" => "",
        //                 "og:description" => "",
        //                 "og:site_name" => "",
        //                 "og:locale" => "",
        //                 "article:author" => "",
        //                 "op:markup_version" => "",
        //                 "fb:article_style" => ""
        //             ],
        //             "attributes" => "itemprop,content",
        //             "values" =>
        //             [
        //                 "name" => "",
        //                 "description" => "",
        //                 "image" => ""
        //             ]
        //         ];
        //         //
        //         //
    }
    //
    private function setHeaders() {
        $this->headers = ["name","http-equiv","content"];
    }
    //
    private function setAttr() {
        $this->template =
                        ["pair" => [
                            "viewport" => "width=device-width, initial-scale=1.0",
                            "application-name" => "",
                            "description" => "",
                            "robots" => "",
                            "googlebot" => "",
                            "google" => "",
                            "google-site-verification" => "",
                            "generator" => "",
                            "subject" => "",
                            "abstract" => "",
                            "url" => "",
                            "directory" => "",
                            "rating" => "",
                            "format-detection" => "",
                            "ICBM" => "",
                            "geo.position" => "",
                            "geo.region" => "",
                            "geo.placename" => ""
                        ]];
    }
    //
    public function getElements($resultType) {
        if ($resultType !== NULL) {
            $filteredArray = array_filter(array_intersect_key(
                $this->data["pair"],
                $this->template["pair"]
            ));
        } else {
            $filteredArray = $this->template["pair"];
        }
        //
        foreach ($filteredArray as $k => $v) {
            print "<meta name=\"$k\" content=\"$v\" >".PHP_EOL;


        }
    }


    //
    public function __clone() {}

    //
    public static function Instance ()
    {
        if(self::$_instance == null) {

            self::$_instance = new Meta();

        }
        return self::$_instance;
    }
}

class Link
{
    use GetSet;

    private static $_instance = null;
    //
    private $headers = [];
    private $data = [];
    private $template = [];

    public function __construct () {
        $this->data["pair"] = [];
        self::setHeaders();
        self::setAttr();
    }
    //
    private function setHeaders() {
        $this->headers = ["rel","href"];
    }
    //
    private function setAttr() {
        $this->template =
                        ["pair" => [
                            "canonical" => "",
                            "stylesheet" => "",
                            "shortlink" => "",
                            "amphtml" => "",
                            "author" => ""
                        ]];
    }
    //
    public function getElements($resultType) {
        if ($resultType !== NULL) {
            $filteredArray = array_filter(array_intersect_key(
                $this->data["pair"],
                $this->template["pair"]
            ));
        } else {
            $filteredArray = $this->template["pair"];
        }
        //
        foreach ($filteredArray as $k => $v) {
            echo PHP_EOL;
            echo "<link rel='{$k}' href='{$v}' >";

        }

    }
    public function __clone() {}
    //
    public static function Instance ()
    {
        if(self::$_instance == null) {

            self::$_instance = new Link();

        }
        return self::$_instance;
    }
}
