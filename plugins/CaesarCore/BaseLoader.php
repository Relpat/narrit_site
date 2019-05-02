<?php

namespace Narrit\Plugins\CaesarCore\Loader;

use Narrit\Plugins\CaesarCore\Core;

class BaseLoader extends Core
{

    protected $pluginDirectory;

    public function __construct(&$file)
    {
        parent::__construct($file);

        $this->pluginDirectory = $this->getCurrentDir($file);
    }

}

