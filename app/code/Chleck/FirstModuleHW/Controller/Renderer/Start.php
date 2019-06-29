<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 */

namespace Chleck\FirstModuleHW\Controller\Folder\Start;
use Magento\Framework\App\Action\Action as AbstractAction;

/**
 * Class Start
 * @package Chleck\FirstModuleHW\Controller\Folder\Start
 */

class Start extends AbstractAction
{

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */

    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

    }
}
