<?
namespace Narrit\Plugins\CaesarCore\Model;
use \Narrit\Core\Core;

class Model extends Core
{
    public $defaultRequestInformation = [];

    function __construct()
    {
        parent::__construct();
        Model::init();
    }

    private function init()
    {
        $this->defaultRequestInformation = [
            'createddate' => date($this->_SETTINGS->getDateTimeFormat()),
            'editdate' => date($this->_SETTINGS->getDateTimeFormat())
        ];
    }

//    public function sendRequest($request)
//    {
//        $sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";
//
//        $req = Database::getBdd()->prepare($sql);
//
//        $mergedArray = array_merge($request, defaultRequestInformation);
//
//        return $req->execute([
//            'title' => $title,
//            'description' => $description,
//        ]);
//    }
}

?>