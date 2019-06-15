<?php

namespace Hodovanuk\Task\Controller\Info;
use Magento\Framework\App\Action\Action as AbstractAccount;

class Control extends AbstractAccount
{
    public function execute()
    {
        echo "Hodovanuk 1.1 test task";
        exit();
    }
}
