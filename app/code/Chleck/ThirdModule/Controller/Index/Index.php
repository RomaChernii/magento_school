<?php
/**
 * Chleck ThirdModule Controller Index Index
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
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
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $resultRedirect->setPath('third/redirect/redirect');

        return $resultRedirect;
    }
}
