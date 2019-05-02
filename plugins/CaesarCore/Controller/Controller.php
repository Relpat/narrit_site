<?php
namespace Narrit\Plugins\CaesarCore\Controller;

class Controller
{
    var $vars = [];
    var $layout = "default";
    protected $_DEBUG;
    public $model;

    /**
     * Creates the model out of ControllerName.
     * Controller constructor
     */
    function __construct()
    {
        $modelName = $this->getModelOfClassname();
        $this->loadModel($modelName);

        $this->_DEBUG = new Narrit\Debugger\Debugger();
    }

    /**
     * loads the model through the string.
     * creates also a $this-modelName reference.
     *
     * @param $modelName
     */
    private function loadModel($modelName)
    {

        require(ROOT . 'Models/' . $modelName . '.php');
        $this->model = new $modelName();
        $modelNameSmall = strtolower($modelName);
        $this->$modelNameSmall = new $modelName;
    }

    /**
     * Replaced unnecessary parts of the string.
     * Returns the model name
     *
     * @return mixed|string
     */
    protected function getModelOfClassname()
    {
        $className = get_class($this);
        $modelName = str_replace("Controller", "", $className);
        $modelName = ucfirst($modelName);
        return $modelName;
    }

    /**
     * sets the variables for the template-variables
     * @param $variables
     */
    function setVariables($variables)
    {
        $this->vars = array_merge($this->vars, $variables);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private
    function secure_input(
        $data
    ) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected
    function secure_form(
        $form
    ) {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}

?>