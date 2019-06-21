<?php

namespace Dehtiarov\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAccount;

class Index extends AbstractAccount
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

        return $resultRedirect;
    }
}
