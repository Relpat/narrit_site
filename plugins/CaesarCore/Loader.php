<?php

namespace Narrit\Plugins\CaesarCore\Loader;

use Narrit\Plugins\CaesarCore\Dispatcher;

require_once(ROOT . 'plugins/CaesarCore/Settings/Settings.php');
require_once(ROOT . 'plugins/CaesarCore/Debugger/Debugger.php');
require_once(ROOT . 'plugins/CaesarCore/Functions/GeneralFunctions.php');
require_once(ROOT . 'plugins/CaesarCore/Core.php');
require_once(ROOT . 'plugins/CaesarCore/BaseLoader.php');
require_once(ROOT . 'plugins/CaesarCore/Loader.php');

class Loader extends BaseLoader
{
    public function __construct()
    {
        $this->file = __FILE__;
        parent::__construct($this->file);

        // core requirements
        require($this->pluginDirectory . "/Handlers/DatabaseHandler.php");

        // MVC Settings with repository
        require($this->pluginDirectory . "/Repository/Base/BaseRepository.php");
        require($this->pluginDirectory . "/Model/Base/BaseModel.php");
        require($this->pluginDirectory . "/Controller/Base/BaseController.php");


        require($this->pluginDirectory . '/Router.php');
        require($this->pluginDirectory . '/Request.php');
        require($this->pluginDirectory . '/Dispatcher.php');

        $dispatcher = new Dispatcher();
        $dispatcher->dispatch();
    }
}

