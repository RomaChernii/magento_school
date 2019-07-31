<?php
/**
 * Blog comment model
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Koshyk\Blog\Api\Data\CommentInterface;

/**
 * Class Comment
 *
 * @package Koshyk\Blog\Model\Post
 *
 */
class Comment extends AbstractModel implements CommentInterface, IdentityInterface
{
    /**#@+
     * Comment's Statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;
    /**#@-*/
    /**
     * Koshyk comment cache tag
     */
    const CACHE_TAG = 'koshyk_blog_comment';
    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'koshyk_blog_comment';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'koshyk_blog_comment';
    /**
     * comment construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Koshyk\Blog\Model\ResourceModel\Comment');
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
     * Get post id
     *
     * @return string
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
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
     * Get date
     *
     * @return bool
     */
    public function getCreateDate()
    {
        return $this->getData(self::CREATE_DATE);
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
     * Get answer on comment
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }
    /**
     * Get answer
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
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
     * Set create data
     *
     * @param bool $commentDate
     *
     * @return CommentInterface
     */
    public function setCreateDate($commentDate)
    {
        return $this->setData(self::CREATE_DATE, $commentDate);
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
     * Set answer on comment
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
     * @param string $commentStatus
     *
     * @return CommentInterface
     */
    public function setStatus($commentStatus)
    {
        return $this->setData(self::STATUS, $commentStatus);
    }
    /**
     * Prepare comment's statuses.
     *
     * @return array
     */
    public function getAnswerStatuses()
    {
        return [self::STATUS_NEW => __('New'), self::STATUS_IN_PROGRESS => __('In progress'), self::STATUS_CLOSED => __('Closed')];
    }
}
