<?php

namespace ivpel\school\Controller\Index;

use \Magento\Framework\App\Action\Action;

/**
 * Class RedirectToCustomerAccount
 *
 * @package ivpel\school\Controller\Index
 */
class RedirectToCustomerAccount extends Action
{

    /**
     * RedirectToCustomerAccount Action
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $params = $this->getRequest()->getParams();
        $resultRedirect->setPath('customer/account/index');
        if (array_key_exists("success", $params)){
            $resultRedirect->setPath('homework/students/studentslist');
        }
        return $resultRedirect;
    }
}
