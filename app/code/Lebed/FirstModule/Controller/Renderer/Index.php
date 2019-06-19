<?php
/**
 * Lebed FirstModule Renderer Index controller
 *
 * @category  Lebed
 * @package   Lebed/FirstModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstModule\Controller\Renderer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

/*
 * Class Index
 *
 * @package Lebed\FirstModule\Controller\Renderer
 */
class Index extends Action
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /* @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
