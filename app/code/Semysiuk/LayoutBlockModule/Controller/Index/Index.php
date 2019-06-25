<?php

namespace Semysiuk\LayoutBlockModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $param = $this->getRequest()->getParam("success");
        $resultRedirect = $this->resultRedirectFactory->create();

        isset($param) ?
            $resultRedirect->setPath("layout_block/renderer/index") :
            $resultRedirect->setPath("customer/account/index");

        return $resultRedirect;
    }
}
