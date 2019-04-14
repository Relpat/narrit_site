<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 09.04.2019
 * Time: 19:28
 */

namespace Narrit\Core;
use Narrit\Settings\Settings;

class NarritCore
{
    protected $_SETTINGS;

    function __construct()
    {
        NarritCore::init_core();
    }

    function init_core()
    {
        $this->_SETTINGS = new Settings();
    }
}