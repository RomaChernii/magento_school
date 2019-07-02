<?php
/**
 * Lebed ThirdHomeModule Index Redirecter Controller
 *
 * @category  Lebed
 * @package   Lebed/ThirdHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\ThirdHomeModule\Controller\Redirecter;

use Magento\Framework\App\Action\Action;

/**
 * Class Index
 *
 * @package Lebed\ThirdHomeModule\Controller\Redirecter
 */
class Index extends Action
{
    /**
     * Index Action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('lebed_third_home/index/index');
    }
}
