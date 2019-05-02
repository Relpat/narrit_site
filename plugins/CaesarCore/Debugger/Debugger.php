<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 14.04.2019
 * Time: 17:03
 */
namespace Narrit\Plugins\CaesarCore\Debugger;

class Debugger
{
    /**
     * prints out the array into the browser console
     */
    public function debug($array, $name="")
    {
        echo '<script>';
        echo 'console.log("' . $name . '",' . json_encode($array) . ')';
        echo '</script>';
    }
}