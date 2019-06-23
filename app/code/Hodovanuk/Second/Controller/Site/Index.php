<?php
/**
 * Connects the layout and context to the page
 *
 * @category Hodovanuk
 * @package Hodovanuk/Second
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */
namespace Hodovanuk\Second\Controller\Site;

use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\View\Page\Config;

class Index extends Action
{
    protected $_pageFactory;
    protected $_pageConfig;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Config $pageConfig
    ) {
        $this->_pageConfig = $pageConfig;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_pageConfig->getTitle()->set('Hodovanuk second homework');

        return $this->_pageFactory->create();
    }
}
