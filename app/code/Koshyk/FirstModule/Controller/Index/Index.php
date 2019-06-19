<?php
/**
 * Koshyk/FirstModule/Controller/Index/Index
 *
 * Redirected page if URL is no success parameter
 *
 * @category Koshyk
 * @package Koshyk/FirstModule
 * @author Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        $params = $this->getRequest()->getParams();
        if(array_key_exists('success', $params)) {
            $resultRedirect->setPath('koshykfm/task/index');
        }

        return $resultRedirect;
    }
}

