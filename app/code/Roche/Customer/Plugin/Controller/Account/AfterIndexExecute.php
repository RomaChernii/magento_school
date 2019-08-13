<?php
/**
 * Change customer account page title
 *
 * @category  Roche
 * @package   Roche\Customer
 * @author    Roche Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Customer\Plugin\Controller\Account;

use Magento\Customer\Controller\Account\Index as CustomerAccount;
use Magento\Framework\View\Result\Page;

/**
 * Class AfterIndexExecute
 *
 * @package Roche\Customer\Plugin\Controller\Account
 */
class AfterIndexExecute
{
    /**
     * After "afterExecute"
     *
     * @param CustomerAccount $subject Subject
     * @param Page $result  Result
     *
     * @return Page
     */
    public function afterExecute(CustomerAccount $subject, $result)
    {
        $result->getConfig()->getTitle()->set(__('Customer Account'));

        return $result;
    }
}
