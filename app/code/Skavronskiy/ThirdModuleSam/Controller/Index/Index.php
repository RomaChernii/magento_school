<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Skavronskiy\ThirdModuleSam\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

class Index extends AbstractAction
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('skavronskiy_third_module/renderer/index');

        return $resultRedirect;
    }
}
