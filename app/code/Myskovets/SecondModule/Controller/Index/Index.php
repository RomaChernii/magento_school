<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Myskovets\SecondModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;
use Magento\Framework\App\Action\Context;

class Index extends AbstractAction
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        if (isset($this->getRequest()->getParams()['success'])) {
            return $resultRedirect->setPath("first_module");
        }

        return $resultRedirect->setPath('customer/account/index');
    }
}
