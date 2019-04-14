<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 14.04.2019
 * Time: 19:51
 */

namespace Narrit\Story;

use Narrit\Core\Repository\DefaultRepository;

class StoryRepository extends DefaultRepository
{
    public $repository;

    public function __construct()
    {
        parent::__construct();
    }



}