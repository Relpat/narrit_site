<?php

namespace Narrit\Plugins\CaesarCore;

class Request
{
    public $url;
    public $urlGetParameters;

    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->urlGetParameters = $_GET['pid'];

        echo "<pre>";
        var_dump($this->urlGetParameters);
        die;
    }

}

?>