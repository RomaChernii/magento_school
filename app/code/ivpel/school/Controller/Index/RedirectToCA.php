<?php
namespace ivpel\school\Controller\Index;

class RedirectToCA extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('customer/account/index');
    }
}