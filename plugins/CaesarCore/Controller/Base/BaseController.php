<?
namespace Narrit\Plugins\CaesarCore\Controller\Base;

use \Narrit\Plugins\CaesarCore\Functions\GeneralFunctions;

class BaseController extends GeneralFunctions
{
    var $vars = [];
    var $layout = "default";
    public $model;

    /**
     * Creates the model out of ControllerName.
     * Controller constructor
     */
    function __construct()
    {
        parent::__construct();
        $modelName = $this->getModelnameOfClassname();
        $this->loadModel($modelName);
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
        require(ROOT . "Views/" . $this->getModelnameOfClassname() . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input( $data ) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form( $form ) {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}

?>