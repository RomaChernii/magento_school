<?php
/**
 * Chleck ThirdModule Controller Redirect Redirect
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 */

namespace Chleck\ThirdModule\Controller\Redirect;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Redirect extends Action
{
    /**
     * @var PageFactory
     */
    protected $PageFactory;

    /**
     * Redirect constructor.
     * @param Context $context
     * @param PageFactory $PageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $PageFactory
    )
    {
        parent::__construct($context);
        $this->PageFactory = $PageFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        $resultPage = $this->PageFactory->create();

        return $resultPage;
    }
}
