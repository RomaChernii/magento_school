<?php

/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Hodovanuk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        $params=$this->getRequest()->getParams();
        if(array_key_exists('success', $params)) {
            $resultRedirect->setPath('hodovanukfm/task/index');
        }

        return $resultRedirect;
    }
}
