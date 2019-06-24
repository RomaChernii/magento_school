<?php


namespace Chleck\SecondModuleHW\Controller\Index;
use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Chleck\SecondModuleHW\Controller\Index
 */

class Index extends Action
{

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */

    public function execute(){

      /*echo "Home work module."; die;*/
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

}

