<?php
namespace Semysiuk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $resultRedirect = $this->resultRedirectFactory->create();

            isset($params['success']) ?
            $resultRedirect->setPath('semysiuk_firstmodule/renderer/index') :
            $resultRedirect->setPath('customer/account/index');

        return $resultRedirect;
    }
}
