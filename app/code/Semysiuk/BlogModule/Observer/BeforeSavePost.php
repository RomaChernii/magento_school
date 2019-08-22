<?php

namespace Semysiuk\BlogModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class BeforeSavePost implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $post = $observer->getEvent()->getPost();
        $post->setTitle(__('Title from observer'));
    }
}
