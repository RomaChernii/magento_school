<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chleck\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

class Index extends AbstractAction
{

    public function execute()
    {
        echo "Hello World";
        exit();
    }
}