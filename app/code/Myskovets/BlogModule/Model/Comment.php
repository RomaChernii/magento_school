<?php


namespace Myskovets\BlogModule\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Myskovets\BlogModule\Api\Data\CommentInterface;

class Comment extends AbstractModel implements CommentInterface, IdentityInterface
{

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getUserFirstName()
    {
        return $this->getData(self::USER_FIRST_NAME);
    }

    public function getUserLastName()
    {
        return $this->getData(self::USER_LAST_NAME);
    }

    public function getUserEmail()
    {
        return $this->getData(self::USER_EMAIL);
    }

    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setUserFirstName($userFirstName)
    {
        $this->setData(self::USER_FIRST_NAME, $userFirstName);
    }

    public function setUserLastName($userLastName)
    {
        $this->setData(self::USER_LAST_NAME, $userLastName);
    }

    public function setUserEmail($userEmail)
    {
        $this->setData(self::USER_EMAIL, $userEmail);
    }

    public function setPostId($postId)
    {
        $this->setData(self::POST_ID, $postId);
    }

    public function setStatus($status)
    {
        $this->setData(self::STATUS, $status);
    }

    public function getAvailableStatuses() {
        return [
            self::STATUS_NORMAL => "Normal",
            self::STATUS_EDITED => "Normal, Edited",
            self::STATUS_DELETED => "This comment was deleted"
        ];
    }
}