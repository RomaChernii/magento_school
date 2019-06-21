<?php
namespace Semysiuk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

        return $resultRedirect;
    }
}
