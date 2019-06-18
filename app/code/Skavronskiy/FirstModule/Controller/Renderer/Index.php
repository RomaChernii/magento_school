<?php

namespace Skavronskiy\FirstModule\Controller\Renderer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 *
 * @package Roche\Test\Controller\Renderer
 */
class Index extends Action
{

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}