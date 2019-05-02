<?php
namespace Narrit\Plugins\CaesarCore\Controller;

class RequestHandler{

    private $url;
    private $urlParameter;


    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->urlParameter = $_GET['pid'];
    }

    /**
     * creates an array out of the url-request.
     *
     * e.g.:
     * narrit.de/home/faq/question/the+search+question
     * => ?pageId=[12] // home/faq
     * => &plugin[questionPlugin] // pluginCall
     * => &controller[default] // pluginController
     * => &parameters[param] // "the+search+question"
     *
     * @param $parameters
     * @return array
     */
    private function isPageExistent($parameters){

        return $this->setUrl(url);
    }



    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrlParameter()
    {
        return $this->urlParameter;
    }

    /**
     * @param mixed $urlParameter
     */
    public function setUrlParameter($urlParameter)
    {
        $this->urlParameter = $urlParameter;
    }

}