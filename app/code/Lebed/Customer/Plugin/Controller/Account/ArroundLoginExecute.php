<?php
/**
 * Lebed Blog ArroundLoginExecute
 *
 * @category  Lebed
 * @package   Lebed\Customer
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Login as CustomerLogin;
use Magento\Framework\View\Result\Page;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class ArroundLoginExecute
 *
 * @package Lebed\Customer\Plugin\Controller\Account
 */
class ArroundLoginExecute
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Session $customerSession
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Session $customerSession,
        PageFactory $resultPageFactory
    ) {
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Customer Account arround execute plugin
     *
     * @param CustomerLogin $subject
     * @param \Closure $proceed
     *
     * @return Page
     */
    public function aroundExecute(
        CustomerLogin $subject,
        \Closure $proceed
    ) {
        // without calling $proceed() in arround plugin, all next by sorting plugins not called
        if ($this->session->isLoggedIn()) {
            /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*/*/');
            return $resultRedirect;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setHeader('Login-Required', 'true');
        return $resultPage;
    }
}
