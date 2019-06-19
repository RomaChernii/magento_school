<?php

/**
 * Hodovanuk/FirstModule/Controller/Index/Index
 *
 * The page will automatically be redirected if there is no success parameter
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        $params = $this->getRequest()->getParams();
        if(array_key_exists('success', $params)) {
            $resultRedirect->setPath('hodovanukfm/task/index');
        }

        return $resultRedirect;
    }
}
