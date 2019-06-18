<?php
namespace Semysiuk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

class Index extends AbstractAction
{
    public function execute()
    {
        echo "Hello World";

        exit();
    }
}