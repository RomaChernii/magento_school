<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 */
namespace Chleck\FirstModuleHW\Controller\Folder;

use Magento\Framework\App\Action\Action as AbstractAction;

class Start extends AbstractAction
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */

    /*public function execute()
    {
        echo "Hello World";
        exit();
    }*/
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        //var_dump($params);die;

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

        if (array_key_exists("success",$params)) {
            $resultRedirect->setPath('chleckfirstmodulehw/index/index');
        }

        return $resultRedirect;
    }
}
