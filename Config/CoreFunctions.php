<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 14.04.2019
 * Time: 17:59
 */

namespace Narrit\Core;

use Narrit\Core\Debugger\Debugger;

class CoreFunctions
{
    protected $_DEBUG;

    public function __construct()
    {
        $this->_DEBUG = new Debugger();
    }

    /**
     * Replaced unnecessary parts of the string.
     * Returns the model name
     *
     * @return mixed|string
     */
    protected function getModelnameOfClassname()
    {
        $className = get_class($this);

        $searchParameter = array(
            "Controller",
            "Repository",
            "Model"
        );

        $modelName = str_replace($searchParameter, "", $className);
        $modelName = ucfirst($modelName);
        return $modelName;
    }


    /**
     * gets the current dir
     *
     * @return string
     */
    protected function getCurrentDir(&$file = __FILE__)
    {
        return dirname($file);
        return dirname($_SERVER['PHP_SELF']);
    }
}