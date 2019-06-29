<?php


namespace Chleck\SecondModuleHW\Controller\ChleckIndexTest;
use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Chleck\SecondModuleHW\Controller\Index
 */

class IndexTest extends Action
{

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */

    public function execute(){

        $this->_view->loadLayout();
        $this->_view->renderLayout();
        echo "Hi, it is my home work.)))";
    }



}

