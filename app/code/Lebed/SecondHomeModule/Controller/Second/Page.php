<?php
/**
 * Lebed SecondHomeModule Second Page controller
 *
 * @category  Lebed
 * @package   Lebed/SecondHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */

namespace Lebed\SecondHomeModule\Controller\Second;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Page
 *
 * @package Lebed\SecondHomeModule\Controller\Second
 */
class Page extends Action
{
    /**
     * Page Factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Page constructor.
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
     * Page action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $page */
        $page = $this->resultPageFactory->create();

        return $page;
    }
}
