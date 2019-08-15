<?php

namespace Semysiuk\BlogModule\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Semysiuk\BlogModule\Api\Data\CommentInterface;

class Comment extends AbstractModel implements IdentityInterface, CommentInterface
{
    /**#@+
     * Comment statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;
    /**#@-**/

    /**
     * Semysiuk comment cache tag
     */
    const CACHE_TAG = "semysiuk_comment_tag";

    /**
     * Cache tag
     *
     * @var string
     */
    const cache_tag = "semysiuk_comment_tag";

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'semysiuk_comment_post';

    /**
     * Comment construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("Semysiuk\BlogModule\Model\ResourceModel\Comment");
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    public function getFullName()
    {
        $fullName = $this->getFirstName() . " " . $this->getLastName();

        return $fullName;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Get post Id
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * Set Id
     *
     * @param int $id
     *
     * @return CommentInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set first name
     *
     * @param string $firstName
     *
     * @return CommentInterface
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * Set last name
     *
     * @param string $lastName
     *
     * @return CommentInterface
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CommentInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return CommentInterface
     */
    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }

    /**
     * Set status
     *
     * @param int $status
     *
     * @return CommentInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Set post id
     *
     * @param int $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * Prepare post's statuses.
     * Available event blog_comment_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return
            [
                self::STATUS_NEW => __('New'),
                self::STATUS_IN_PROGRESS => __('In progress'),
                self::STATUS_CLOSED => __("Closed")
            ];
    }
}
