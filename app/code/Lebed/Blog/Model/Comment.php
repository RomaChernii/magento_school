<?php
/**
 * Lebed Blog Comment Model
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Lebed\Blog\Api\Data\CommentInterface;
use Magento\Framework\Validator\EmailAddress;

/**
 * Class Comment
 *
 * @package Lebed\Blog\Model
 */
class Comment extends AbstractModel implements CommentInterface, IdentityInterface
{
    /**#@+
     * Comments statuses
     */
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_CLOSED = 'closed';
    /**#@-*/

    /**
     * Lebed blog comment cache tag
     */
    const CACHE_TAG = 'lebed_blog_comment';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'lebed_blog_comment';

    /**
     * Prefix of model event names
     *
     * @var string
     */
    public $eventPrefix = 'lebed_blog_comment';

    /**
     * Post construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Lebed\Blog\Model\ResourceModel\Comment');
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
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get Post ID
     *
     * @return int
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
     * Get Answer
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
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Get creation time
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
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
     * Set post ID
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
     * Set Email
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
     * @param string $status
     *
     * @return CommentInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return CommentInterface
     */
    public function setCreatedAt($creationTime)
    {
        return $this->setData(self::CREATED_AT, $creationTime);
    }

    /**
     * Prepare comment`s statuses.
     * Available event blog_comment_get_available_statuses to customize statuses
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [
            self::STATUS_NEW         => __('New'),
            self::STATUS_IN_PROGRESS => __('In progress'),
            self::STATUS_CLOSED      => __('Closed'),
        ];
    }

    /**
     * Validate Comment
     *
     * @return array|bool
     * @throws \Zend_Validate_Exception
     */
    public function validate()
    {
        $errors = [];

        if (!\Zend_Validate::is($this->getFirstName(), 'NotEmpty')) {
            $errors[] = __('Please enter your first name');
        }

        if (!\Zend_Validate::is($this->getLastName(), 'NotEmpty')) {
            $errors[] = __('Please enter your last name');
        }

        if (!\Zend_Validate::is($this->getEmail(), 'NotEmpty')) {
            $errors[] = __('Please enter your e-mail');
        }

        if (!\Zend_Validate::is($this->getEmail(), EmailAddress::class)) {
            $errors[] = __('Please enter a valid e-mail');
        }

        if (!\Zend_Validate::is($this->getComment(), 'NotEmpty')) {
            $errors[] = __('Please enter a comment');
        }

        if (empty($errors)) {
            return true;
        }

        return $errors;
    }
}
