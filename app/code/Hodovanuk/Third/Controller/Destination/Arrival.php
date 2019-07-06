<?php
/**
 * Arrival action
 *
 * @category Hodovanuk
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\Third\Controller\Destination;

use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

/**
 * Class Arrival
 * @package Hodovanuk\Third\Controller\Destination
 */
class Arrival extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * Arrival constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $returnValue = $this->_pageFactory->create();

        $param = $this->getRequest()->getParams();

        $myRedirect = $this->resultRedirectFactory->create();

        if (array_key_exists('submit', $param)){
            $myRedirect->setPath('checkout/cart/');
            $returnValue = $myRedirect;
        }

        return $returnValue;
    }
}
