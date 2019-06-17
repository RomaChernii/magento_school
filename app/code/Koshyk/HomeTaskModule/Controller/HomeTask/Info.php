<?php

namespace Koshyk\HomeTaskModule\Controller\HomeTask;
use Magento\Framework\App\Action\Action as AbstractAction;
class Info extends AbstractAction
{
    public function execute()
    {
        echo 'Koshyk homework';
        exit();
    }
}