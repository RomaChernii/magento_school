<?php

namespace ivpel\homework\Controller\Students;

/**
 * Class StudentsList
 * @package ivpel\homework\Controller\Students
 */
class StudentsList extends \Magento\Framework\App\Action\Action
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