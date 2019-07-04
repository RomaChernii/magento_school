<?php
/**
 * Page redirect user if $getRequestParems = condition
 *
 * @category Hodovanuk
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\Third\Controller\Redirect;

use Magento\Framework\App\Action\Action;

/**
 * Class Redirect
 * @package Hodovanuk\Third\Controller\Redirect
 */
class Redirect extends Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $getRequestParams = $this->getRequest()->getParams();

        $myRedirect = $this->resultRedirectFactory->create();

        if (array_key_exists('redirect', $getRequestParams) && $getRequestParams['redirect'] == 'true') {
            $myRedirect->setPath('hometask/destination/arrival');

            return $myRedirect;
        }
        else {
            echo "For redirect set params: redirect = true";
        }
    }
}
