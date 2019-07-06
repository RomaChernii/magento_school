<?php

namespace Myskovets\FifthModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Display extends Action {

    public function execute()
    {
        $redirect = $this->resultRedirectFactory->create();
        return $redirect->setPath('fifthmodule/index1/display/');
    }
}