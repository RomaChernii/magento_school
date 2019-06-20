<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Chleck\FirstModuleHW\Controller\Folder\Start;

use Magento\Framework\App\Action\Action as AbstractAction;
//use Magento\Framework\App\Action\Context;

class Start extends AbstractAction
{

    /*public function execute()
    {
        echo "Hello World";
        exit();
    }*/


    public function execute()
    {

       // echo "Hello World"; die;
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

        //return $resultRedirect;
    }
}