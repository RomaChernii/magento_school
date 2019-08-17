<?php

namespace Skavronskiy\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Index as CustomerAccount;
use Magento\Framework\View\Result\Page;

class AfterIndexExecute
{
    public function afterExecute(CustomerAccount $subject, $result)
    {
        $result->getConfig()->getTitle()->set(__('Customer Account'));

        return $result;
    }
}
