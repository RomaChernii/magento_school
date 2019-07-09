<?php

namespace Myskovets\FifthModule\Controller\Index1;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;

class Display extends Action {

    private $_pageFactory;

    public function __construct(Context $context, PageFactory $_pageFactory) {
        $this->_pageFactory = $_pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}