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
        var_dump($this->getRequest()->getParams());
        echo '<form method="get" action=""><input type="submit" id="submitid" name="submitname" value="submitvakue"></form>';
        exit();
    }
}
