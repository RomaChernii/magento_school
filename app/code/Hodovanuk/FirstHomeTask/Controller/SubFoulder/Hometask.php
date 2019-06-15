<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hodovanuk\FirstHomeTask\Controller\SubFoulder;
use Magento\Framework\App\Action\Action as AbstractAction;
class Index extends AbstractAction
{
    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        echo 'Hello world';
        exit();
    }
}