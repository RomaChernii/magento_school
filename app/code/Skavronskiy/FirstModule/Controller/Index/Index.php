<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Skavronskiy\FirstModule\Controller\Index;


use Magento\Framework\App\Action\Action as AbstractAction;
class Index extends AbstractAction
{

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        $params = $this->getRequest()->getParams();
        if(array_key_exists("success", $params)) {
            $resultRedirect->setPath('skavronskiy_first_module/renderer/index');
        }

        return $resultRedirect;
    }
}


