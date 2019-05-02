<?php
/**
 * Created by PhpStorm.
 * User: Patrick Hippler
 * Date: 09.04.2019
 * Time: 19:13
 */

namespace Narrit\Plugins\CaesarCore\Settings;

final class Settings
{
    private $dateTimeFormat = "Y-m-d H:i:s";

    /**
     * @return string
     */
    public function getDateTimeFormat()
    {
        return $this->dateTimeFormat;
    }
}