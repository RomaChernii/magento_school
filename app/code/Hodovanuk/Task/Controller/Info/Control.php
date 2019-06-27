<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hodovanuk\Task\Controller\Info;

use Magento\Framework\App\Action\Action;

class Control extends Action
{
    public function execute()
    {
        echo 'hello word hodovanuk 1.1 test task';
        exit();
    }
}
