<?php

namespace Narrit\Plugins\CaesarCore;
/**
 * Class Router
 */
class Router
{
    /**
     * parses the requested URL
     * domain.de/controller/action/[parameters]
     *
     * @param $url
     * @param $request
     */
    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/PHP_Rush_MVC/") {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);

            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}

?>