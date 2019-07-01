<?php
/**
 * Chleck ThirdModule Controller Redirect Redirect
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 */

namespace Chleck\ThirdModule\Controller\Redirect;

use Magento\Framework\App\Action\Action;

/**
 * Class Redirect
 * @package Chleck\ThirdModule\Controller\Redirect
 */
class Redirect extends Action
{
    public function execute()
    {
       return "You was redirected from controller(Chleck\ThirdModule\Controller\Index)";
    }
}
