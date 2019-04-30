<?php

/**
 * Class Dispatcher
 */
class Dispatcher
{
    private $request;

    /**
     * get all the information and send them to the requested controller
     */
    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        // get the information
        $controller = $this->loadController();
        $action = $this->request->action.'Action';
        $params = $this->request->params;

        call_user_func_array([
            $controller,
            $action
        ],
            $params
        );
    }

    /**
     * load the controller
     * @return mixed
     */
    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';

        require($file);
        $controller = new $name();
        return $controller;
    }
}

?>