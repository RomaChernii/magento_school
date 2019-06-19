<?php
/**
 * Lebed FirstModule Index Index controller
 *
 * @category  Lebed
 * @package   Lebed/FirstModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstModule\Controller\Index;

use Magento\Framework\App\Action\Action as AbstractAction;

/*
 * Class Index
 *
 * @package Lebed\FirstModule\Controller\Index
 */
class Index extends AbstractAction
{
    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('customer/account/index');

        return $resultRedirect;
    }
}
