<?php

namespace Semysiuk\BlogModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Backend\App\Action\Context;

/**
 * Class AfterSavePost
 *
 * @package Semysiuk\BlogModule\Observer
 */
class AfterSavePost implements ObserverInterface
{
    public $messageManager;

    public function __construct(Context $context)
    {
        $this->messageManager = $context->getMessageManager();
    }

    public function execute(Observer $observer)
    {
        $id =  $observer->getEvent()->getDataByKey("post_id");
        $this->messageManager->addSuccessMessage(__("Post with ID-" . $id . " successfully saved."));
    }
}
