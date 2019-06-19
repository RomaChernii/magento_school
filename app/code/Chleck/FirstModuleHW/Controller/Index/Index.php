<?php


namespace Chleck\FirstModuleHW\Controller\Index;

use Magento\Framework\App\Action\Action;
/*use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
*/

class Index extends Action
{
   /*public  $pageFactory;

   public function __construct(Context $context,
                                PageFactory $pageFactory)
    {
        $this-> pageFactory = $pageFactory;
        return parent::__construct($context);
    }*/

    public function execute(){
        //var_dump(123213);die;
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }


}