<?
namespace Narrit\Plugins\CaesarCore\Model\Base;
use \Narrit\Plugins\CaesarCore\Repository\Base\BaseRepository;

class BaseModel extends BaseRepository
{
    public $defaultRequestInformation = [];
    public $repository;
    public $modelInformation;
    protected $id;
    protected $createdTime;
    protected $lastEdit;

    function __construct($file)
    {
        parent::__construct($file);
        $this->id;

    }

    private function init()
    {
        $this->defaultRequestInformation = [
            'createddate' => date($this->_SETTINGS->getDateTimeFormat()),
            'editdate' => date($this->_SETTINGS->getDateTimeFormat())
        ];
    }
}

?>