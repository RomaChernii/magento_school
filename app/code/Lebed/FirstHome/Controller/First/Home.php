<?php
/**
 * Lebed FirstHome Folder Class controller
 *
 * @category  Lebed
 * @package   Lebed/FirstHome
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstHome\Controller\First;

use Magento\Framework\App\Action\Action;

/*
 * Class Home
 *
 * @package Lebed\FirstHome\Controller\First
 */
class Home extends Action
{
    /**
     * Home Action
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('lebed_first_module/index/index');
    }
}
