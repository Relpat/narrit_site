<?php

class storyDefaultController extends DefaultController
{

    function index()
    {
        $templateVars['storys'] = $this->model->getAll();
        $this->render("index");
    }

    function edit($id)
    {
        $modelInformation = $this->story->findById($id);

        $modelName = strtolower($this->getModelnameOfClassname());
        $templateVars[$modelName] = $modelInformation;

        $this->_DEBUG->debug($templateVars);

        $this->setVariables($templateVars);
        $this->render("edit");
    }

    function read($id){
        $modelInformation = $this->story->findById($id);

        $this->_DEBUG->debug($modelInformation);

        $modelName = strtolower($this->getModelnameOfClassname());
        $templateVars[$modelName] = $modelInformation;

        $this->_DEBUG->debug($templateVars);

        $this->setVariables($templateVars);
        $this->render("read");
    }
}

?>