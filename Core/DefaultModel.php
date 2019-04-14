<?

use \Narrit\Core\Repository\DefaultRepository;

class DefaultModel extends DefaultRepository
{
    public $defaultRequestInformation = [];
    public $repository;
    protected $id;
    protected $createdTime;
    protected $lastEdit;

    function __construct()
    {
        parent::__construct();
//        DefaultModel::init();

        $this->repository = new \Narrit\Core\Repository\DefaultRepository();
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