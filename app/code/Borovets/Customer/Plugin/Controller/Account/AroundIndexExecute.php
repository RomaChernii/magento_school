<?php

namespace Borovets\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Index as CustomerAccount;
use Magento\Framework\View\Result\PageFactory;


class AroundIndexExecute
{
    protected $resultPageFactory;

    public function __construct(
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
    }

    public function aroundExecute(CustomerAccount $subject, $result)
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Customer Account'));

        return $resultPage;
    }
}
