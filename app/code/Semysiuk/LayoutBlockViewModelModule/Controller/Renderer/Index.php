<?php

namespace Semysiuk\LayoutBlockViewModelModule\Controller\Renderer;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        echo "Hello from renderer";

        exit();
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
    }
}
