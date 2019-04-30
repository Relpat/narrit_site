<?

use \Narrit\Core\Repository\DefaultRepository;

class DefaultModel extends DefaultRepository
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
//        DefaultModel::init();

//        $this->repository = new \Narrit\Core\Repository\DefaultRepository();
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