<?php


namespace Chleck\FirstModuleHW\Controller\Index;
use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Chleck\FirstModuleHW\Controller\Index
 */

class Index extends Action
{
    /**
     * @var PageFactory
     */

   public  $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */

   public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this-> pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */

    public function execute(){

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }


}

