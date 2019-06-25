<?php
/**
 * Roche Test controller index index
 *
 * @category  Roche
 * @package   Roche\Test
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Test\Controller\Index;

use Magento\Framework\App\Action\Action;

/**
 * Class Index
 *
 * @package Roche\Test\Controller\Index
 */
class Index extends Action
{
    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');
        if (array_key_exists('success', $params)) {
            $resultRedirect->setPath('roche_test/renderer/index');
        }

        return $resultRedirect;
    }
}
