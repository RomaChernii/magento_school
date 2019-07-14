<?php


namespace Chleck\Blog\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Chleck\Blog\Api\Data\CommentInterface;


class Comment extends AbstractModel implements CommentInterface, IdentityInterface

{
    /**#@+
     * Post's Statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;

    /**#@-*/

    /**
     * Chleck post cache tag
     */
    const CACHE_TAG = 'chleck_blog_comment';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'chleck_blog_comment';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'chleck_blog_comment';

    /**
     * Post construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Chleck\Blog\Model\ResourceModel\Comment');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getCommentId()];
    }

    /**
     * Retrieve post ID
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * Get comment ID
     *
     * @return string
     */
    public function getCommentId()
    {
        return $this->getData(self::COMMENT_ID);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->getData(self::SURNAME);
    }

    /**
     * Get content
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
        return (bool)$this->getData(self::COMMENT);
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
     * Set post ID
     *
     * @param int $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $$postId);
    }

    /**
     * Set comment ID
     *
     * @param string $commentId
     *
     * @return CommentInterface
     */
    public function setCommentId($commentId)
    {
        return $this->setData(self::POST_ID, $commentId);
    }

    /**
     * Set post image
     *
     * @param string $name
     *
     * @return CommentInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set post description
     *
     * @param string $surname
     *
     * @return CommentInterface
     */
    public function setSurname($surname)
    {
        return $this->setData(self::SURNAME, $surname);
    }

    /**
     * Set post content
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
     * Set post is active
     *
     * @param bool $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * Set creation time
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
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_NEW => __('New comment'), self::STATUS_IN_PROGRESS => __('In progress'), self::STATUS_CLOSED => __('Closed')];
    }
}
