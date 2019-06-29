<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Borovets\FirstHomeModule\Controller\FirstHome;

use Magento\Framework\App\Action\Action;

class Task extends Action
{
    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        echo 'Hello people!';
        exit();
    }
}
