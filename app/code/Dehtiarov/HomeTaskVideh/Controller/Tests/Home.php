<?php

namespace Dehtiarov\HomeTaskVideh\Controller\Tests;

use Magento\Framework\App\Action\Action;

class Home extends Action
{
    public function execute()
    {
        echo "home work at magento 2";
        exit();
    }
}
