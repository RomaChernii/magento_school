<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();
        if(array_key_exists("success", $params)) {
            $resultRedirect->setPath('borovets_firstmodule/renderer/index');
        } else {
            $resultRedirect->setPath('customer/account/index');
        }

        return $resultRedirect;
    }
}
