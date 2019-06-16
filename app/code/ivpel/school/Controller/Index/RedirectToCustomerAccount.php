<?php
namespace ivpel\school\Controller\Index;

/**
 * Class RedirectToCA
 * @package ivpel\school\Controller\Index
 */
class RedirectToCustomerAccount extends \Magento\Framework\App\Action\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('customer/account/index');
    }
}