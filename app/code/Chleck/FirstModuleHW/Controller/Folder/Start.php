<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chleck\FirstModuleHW\Controller\Folder;

use Magento\Framework\App\Action\Action as AbstractAction;

class Start extends AbstractAction
{

    public function execute()
    {
        echo "Hello World";
        exit();
    }
}
