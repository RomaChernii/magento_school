<?php
namespace Hodovanuk\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Hodovanuk\Blog\Api\Data\CommentInterface;

/**
 * Class Post
 *
 * @package Hodovanuk\Blog\Model\Comment
 *
 */
class Comment extends AbstractModel implements CommentInterface, IdentityInterface
{
    /**#@+
     * Comment's Statuses
     */
    const STATUS_NEW = 1;
    const STATUS_CHECKED = 2;
    const STATUS_ANSWERED = 3;
    /**#@-*/

    /**
     * Hodovanuk comment cache tag
     */
    const CACHE_TAG = 'hodovanuk_blog_comment';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'hodovanuk_blog_comment';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'hodovanuk_blog_comment';

    /**
     * comment construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Hodovanuk\Blog\Model\ResourceModel\Comment');
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
     * Retrieve Comment id
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
        return $this->getData(self::FIRST_NAME );
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
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
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
     * Get data
     *
     * @return bool
     */
    public function getCreateData()
    {
        return (bool)$this->getData(self::CREATE_DATA);
    }

    /**
     * Get post id
     *
     * @return string
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
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
     * Set answer
     *
     * @param string $commentAnswer
     *
     * @return CommentInterface
     */
    public function setAnswer($commentAnswer)
    {
        return $this->setData(self::ANSWER, $commentAnswer);
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
     * Set create data
     *
     * @param bool $commentData
     *
     * @return CommentInterface
     */
    public function setCreateData($commentData)
    {
        return $this->setData(self::CREATE_DATA, $commentData);
    }

    /**
     * Set post id
     *
     * @param string $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * Set email
     *
     * @param string $commentEmail
     *
     * @return CommentInterface
     */
    public function setEmail($commentEmail)
    {
        return $this->setData(self::EMAIL, $commentEmail);
    }

    /**
     * Prepare comment's statuses.
     *
     * @return array
     */
    public function getAnswerStatuses()
    {
        return [self::STATUS_NEW => __('NEW'), self::STATUS_CHECKED => __('Checked'), self::STATUS_ANSWERED => __('Answered')];
    }
}
