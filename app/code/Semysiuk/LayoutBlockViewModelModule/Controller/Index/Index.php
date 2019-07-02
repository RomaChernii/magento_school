<?php

namespace Semysiuk\LayoutBlockViewModelModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath("layoutblockviewmodel/renderer/index");

        return $resultRedirect;
    }
}
