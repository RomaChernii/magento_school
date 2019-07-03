<?php


/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chleck\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

/**
 * Class Index
 * @package Chleck\FirstModule\Controller\Index
 */
class Index extends AbstractAction
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        return "Hi";
    }
}

