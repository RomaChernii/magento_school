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
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Redirect extends Action
{


    public function execute()
    {
       return "You was redirected from controller(Chleck\ThirdModule\Controller\Index)";

    }
}
