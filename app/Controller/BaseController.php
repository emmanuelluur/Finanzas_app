<?php
namespace App\Controller;

class BaseController
{
    public static function avoidXss($argument)
    {
        /**
         * ejemplo de uso $this->avoidXss($argument);
         */
        return \htmlspecialchars($argument, ENT_QUOTES);
    }
}
