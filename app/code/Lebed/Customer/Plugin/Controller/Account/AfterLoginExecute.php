<?php
/**
 * Lebed Blog AfterLoginExecute
 *
 * @category  Lebed
 * @package   Lebed\Customer
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Login as CustomerLogin;
use Magento\Framework\View\Result\Page;

/**
 * Class AfterIndexExecute
 *
 * @package Lebed\Customer\Plugin\Controller\Account
 */
class AfterLoginExecute
{
    /**
     * Customer Account after execute plugin
     *
     * @param CustomerLogin $subject
     * @param Page            $result
     *
     * @return Page
     */
    public function afterExecute(CustomerLogin $subject, $result)
    {
        $result->getConfig()->getTitle()->set(__('Customer Account After Plugin'));

        return $result;
    }
}
