<?php

class storyController extends Controller
{

    function index()
    {
        $templateVars['storys'] = $this->model->getAll();
//        $this->set($d);
        $this->render("index");
    }

    function show($id)
    {

        $templateVars["story"] = $this->story->showStory($id);

        $this->set($templateVars);
        $this->render("show");
    }

    function edit($id)
    {
        $d["task"] = $this->story->showStory($id);

        if (isset($_POST["title"])) {
            if ($this->model->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function read($id){
        $modelInformation = $this->story->read($id);
        $modelName = strtolower($this->getModelOfClassname());
        $templateVars[$modelName] = $modelInformation;

        $this->set($templateVars);
        $this->render("read");
    }
}

?>