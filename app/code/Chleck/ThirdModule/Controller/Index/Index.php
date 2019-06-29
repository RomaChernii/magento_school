<?php
/**
 * Chleck ThirdModule Controller Index Index
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 * @copyright 2019 Smile
 */

namespace Chleck\ThirdModule\Controller\Index;

use Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Chleck\ThirdModule\Controller\Index
 */
class Index extends Action
{
    /**
     * Index action
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        if (array_key_exists('success', $params)) {
            $resultRedirect->setPath('third/redirect/redirect');
        }

        return $resultRedirect;
    }
}
