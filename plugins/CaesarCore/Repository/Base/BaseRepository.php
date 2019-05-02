<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 14.04.2019
 * Time: 17:44
 */
namespace Narrit\Plugins\CaesarCore\Repository\Base;

use \Narrit\Plugins\CaesarCore\Functions\GeneralFunctions;

class BaseRepository extends GeneralFunctions
{
    protected $file;
    public function __construct($file)
    {
        parent::__construct();
        $this->file = $file;

        $this->modelInformation = $this->getDatabaseModelInformation();
//        $modelinformation = $this->getDatabaseModelInformation();

//        $this->_DEBUG->debug($modelinformation);
    }

    /**
     * reads the specific ModelInformation out of the model-json-file located in the root-path of the model.
     * File has to be named "'$Modelname' + ModelDatabaseObject.json"
     * E.g. "Story":
     * => StoryModelDatabaseObject.json
     */
    protected function getDatabaseModelInformation()
    {
        if($this->file !== ""){
            $currentDir = $this->getCurrentDir($this->file) ."/";
        }else{
            $currentDir = $this->getCurrentDir() ."/";
        }
        $currentModelName = $this->getModelnameOfClassname();
        $currentModelJsonFile = $currentModelName . 'ModelDatabaseObject.json';

        // Read JSON file
        $json = file_get_contents($currentDir . $currentModelJsonFile);
        //Decode JSON
        $json_data = json_decode($json, true);


        return $json_data;
    }
}