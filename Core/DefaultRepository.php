<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 14.04.2019
 * Time: 17:44
 */

namespace Narrit\Core\Repository;

use \Narrit\Core\CoreFunctions;

class DefaultRepository extends CoreFunctions
{
    public function __construct()
    {
        parent::__construct();
//        $modelinformation = $this->getDatabaseModelInformation();

//        $this->_DEBUG->debug($modelinformation);
    }

    /**
     * reads the specific ModelInformation out of the model-json-file located in the root-path of the model.
     * File has to be named "'$Modelname' + ModelDatabaseObject.json"
     * E.g. "Story":
     * => StoryModelDatabaseObject.json
     */
    protected function getDatabaseModelInformation($file = "")
    {
        if($file !== ""){
            $currentDir = $this->getCurrentDir($file) ."/";
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