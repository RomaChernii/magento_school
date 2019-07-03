<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\ThirdModule\Controller\First;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('borovets_thirdmodule/Second/Index');

        return $resultRedirect;
    }
}
