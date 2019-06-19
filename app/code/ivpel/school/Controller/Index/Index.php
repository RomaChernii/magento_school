<?php

namespace ivpel\school\Controller\Index;

use \Magento\Framework\App\Action\Action;

/**
 * Class Index
 *
 * @package ivpel\school\Controller\Index
 */
class Index extends Action
{
    /**
     * Index action
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
