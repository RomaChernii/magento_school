<?php

namespace ivpel\school\Controller\Index;

/**
 * Class Index
 * @package ivpel\school\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}