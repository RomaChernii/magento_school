<?php

namespace Dehtiarov\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAccount;

class Index extends AbstractAccount
{
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $redirectPath = 'customer/account/index';

        foreach ($params as $key => $val) {
            if ($key == 'success') $redirectPath = 'dehtiarov_firstmodule/renderer/index';
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($redirectPath);

        return $resultRedirect;
    }
}
