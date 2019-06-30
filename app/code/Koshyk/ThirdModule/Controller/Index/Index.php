<?php
/**
 * Koshyk/ThirdModule/Controller/Page/Index
 *
 * Redirected page if URL is no success parameter
 *
 * @category Koshyk
 * @package Koshyk/ThirdModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\ThirdModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        $params = $this->getRequest()->getParams();
        if(array_key_exists('success', $params)) {
            $resultRedirect->setPath('koshyktm/page/index');
        }

        return $resultRedirect;
    }
}

