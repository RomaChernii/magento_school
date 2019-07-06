<?php

namespace Myskovets\FourthModule\Controller\Index;

use \Magento\Framework\App\Action\Action as AbstractAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Display extends AbstractAction {

    public function __construct(
        Context $context,
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}