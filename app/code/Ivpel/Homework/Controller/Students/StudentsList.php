<?php

namespace ivpel\homework\Controller\Students;

use \Magento\Framework\App\Action\Action;

/**
 * Class StudentsList
 *
 * @package Ivpel\Homework\Controller\Students
 */
class StudentsList extends Action
{
    /**
     * StudentsList action
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
