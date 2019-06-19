<?php

/**
 * Hodovanuk/FirstModule/Controller/Task/Index
 *
 * Connects the layout and context to the page
 *
 * @category Hodovanuk
 * @package Hodovanuk/FirstModule
 * @author Mikhaylo Hodovanuk <mishagodovanuk@gmail.com>
 */

namespace Hodovanuk\FirstModule\Controller\Task;

use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
