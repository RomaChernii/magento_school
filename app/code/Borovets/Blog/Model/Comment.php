<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Borovets\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Borovets\Blog\Api\Data\CommentInterface;

/**
 * Class Comment
 *
 * @package Borovets\Blog\Model\Comment
 *
 */
class Comment extends AbstractModel implements CommentInterface, IdentityInterface
{
    /**#@+
     * Comments Statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;
    /**#@-*/

    /**
     * Borovets comment cache tag
     */
    const CACHE_TAG = 'borovets_blog_comment';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'borovets_blog_comment';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'borovets_blog_comment';

    /**
     * Comment construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Borovets\Blog\Model\ResourceModel\Comment');
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
     * Retrieve comment id
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

    /**
     * Get e-mail
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
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
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
     * Get writing time
     *
     * @return string
     */
    public function getWritedAt()
    {
        return $this->getData(self::WRITED_AT);
    }

    /**
     * Get post ID
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * Set ID
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
     * @param string $first_name
     *
     * @return CommentInterface
     */
    public function setFirstName($first_name)
    {
        return $this->setData(self::FIRST_NAME, $first_name);
    }

    /**
     * Set last name
     *
     * @param string $last_name
     *
     * @return CommentInterface
     */
    public function setLastName($last_name)
    {
        return $this->setData(self::LAST_NAME, $last_name);
    }

    /**
     * Set e-mail
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
     * Set writing time
     *
     * @param string $writed_at
     *
     * @return CommentInterface
     */
    public function setWritedAt($writed_at)
    {
        return $this->setData(self::WRITED_AT, $writed_at);
    }

    /**
     * Set post ID
     *
     * @param int $post_id
     *
     * @return CommentInterface
     */
    public function setPostId($post_id)
    {
        return $this->setData(self::POST_ID, $post_id);
    }

    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_NEW => __('New'), self::STATUS_IN_PROGRESS => __('In progress'), self::STATUS_CLOSED => __('Closed')];
    }
}
