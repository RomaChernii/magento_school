<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Myskovets\SecondModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;
use Magento\Framework\App\Action\Context;

class Index extends AbstractAction
{

    private function initIndex() {
    }

    private function generateContent() {
        return 'Hello World';
    }

    public function __construct(Context $context)
    {
        parent::__construct($context);
        $this->initIndex();
    }


    public function execute()
    {
        echo $this->generateContent();
        exit();
    }
}
