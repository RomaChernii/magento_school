<?php

/*namespace Skavronskiy\Customer\Plugin\Controller\Account;

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
*/

namespace Skavronskiy\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Index as CustomerAccount;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;


class AfterIndexExecute
{
    protected $resultPageFactory;

    public function __construct(
        PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
    }

    public function aroundExecute(CustomerAccount $subject, $result)
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Customer Account'));

        return $resultPage;
    }
}
