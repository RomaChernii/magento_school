<?php

/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Potapchuk\HomeTask\Controller\HomeOne;

use Magento\Framework\App\Action\Action as AbstractAction;

class HomeOne extends AbstractAction
{
     // String output
    public function execute()
    {
       echo "My first home-work";
       exit();
    }
}