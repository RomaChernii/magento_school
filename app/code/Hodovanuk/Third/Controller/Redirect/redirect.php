<?php
/**
 * Connects the layout and context to the page
 *
 * @category Hodovanuk
 * @package Hodovanuk/Second
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */
namespace Hodovanuk\Third\Controller\Redirect;

use Magento\Framework\App\Action\Action;

class Redirect extends Action
{
    public function execute()
    {
        $getRequestParams = $this->getRequest()->getParams();

        $myRedirect = $this->resultRedirectFactory->create();

        if (array_key_exists('redirect', $getRequestParams) && $getRequestParams['redirect'] == true) {
            $myRedirect->setPath('hometask/destination/arrival');

            return $myRedirect;
        }
        else {
            echo "for redirect set params: redirect = true";
        }
    }
}
