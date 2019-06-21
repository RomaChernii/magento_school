<?php

namespace Dehtiarov\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAccount;

class Index extends AbstractAccount
{
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $redirectPath = 'customer/account/index';

        if (array_key_exists('success', $params)) $redirectPath = 'dehtiarov_firstmodule/renderer/index';

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($redirectPath);

        return $resultRedirect;
    }
}
