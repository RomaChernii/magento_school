<?php

namespace Semysiuk\LayoutBlockModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        isset($_GET["success"]) ?
            $resultRedirect->setPath("layout_block/Renderer/Index") :
            $resultRedirect->setPath("customer/account/index");

        return $resultRedirect;
    }
}
