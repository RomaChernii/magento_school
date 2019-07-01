<?php


namespace Chleck\FirstModuleHW\Controller\Index;

use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Chleck\FirstModuleHW\Controller\Index
 */
class Index extends Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute(){

        $this->_view->loadLayout();
        $this->_view->renderLayout();

        return "Hello ";
    }
}

