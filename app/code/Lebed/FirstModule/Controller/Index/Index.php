<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Lebed\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

class Index extends AbstractAction
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        echo 'Hello World';
        exit();
    }
}
