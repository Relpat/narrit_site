<?php

use \Narrit\Core\Controller\DefaultController;

class storyController extends DefaultController
{
    function indexAction()
    {
        $templateVars['storys'] = $this->model->getAll();
        $this->render("index");
    }

    /**
     * Edit function.
     * Lets the Editor edit their Storys
     *
     * @param $id
     */
    function editAction($id)
    {
        $modelInformation = $this->story->findById($id);

        $modelName = strtolower($this->getModelnameOfClassname());
        $templateVars[$modelName] = $modelInformation;

        $this->_DEBUG->debug($templateVars);

        $this->setVariables($templateVars);
        $this->render("edit");
    }

    function readAction($id)
    {
        $modelInformation = $this->story->findById($id);

        $modelName = strtolower($this->getModelnameOfClassname());
        $templateVars[$modelName] = $modelInformation;

        $this->_DEBUG->debug($templateVars);

        $this->setVariables($templateVars);
        $this->render("read");
    }

    function saveAction()
    {

        $storyInformation = $_POST;

        $storyId = $storyInformation['story_id'];
        $pagesId = $storyInformation['pages_id'];
        $partials = $storyInformation['partials'];

        $modelInformation = $this->story->saveStory($storyId, $pagesId, $partials);

        return $modelInformation;
    }
}

?>