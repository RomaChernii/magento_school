<?php
/**
 * Lebed Blog AfterSavePost
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class AfterSavePost
 *
 * @package Lebed\Blog\Observer
 */
class AfterSavePost implements ObserverInterface
{
    /**
     * Message Manager
     *
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * AfterSavePost constructor.
     *
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        ManagerInterface $messageManager
    ) {
        $this->messageManager = $messageManager;
    }

    /**
     * Observer execute
     *
     * event: lebed_blog_post_success_save
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $data = $observer->getEvent()->getPost();
        $this->messageManager->addSuccessMessage('This work observer after saving post id ' . $data->getId());
    }
}
