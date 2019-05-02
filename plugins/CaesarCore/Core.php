<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 09.04.2019
 * Time: 19:28
 */

namespace Narrit\Plugins\CaesarCore;
use Narrit\Plugins\CaesarCore\Functions\GeneralFunctions;
use Narrit\Plugins\CaesarCore\Settings\Settings;

class Core extends GeneralFunctions
{
    protected $_SETTINGS;

    function __construct()
    {
        parent::__construct();
        Core::init_core();
    }

    function init_core()
    {
        $this->_SETTINGS = new Settings();
    }
}