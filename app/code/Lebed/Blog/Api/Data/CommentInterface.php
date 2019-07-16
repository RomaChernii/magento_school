<?php
/**
 * Lebed Blog Comment Interface
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Api\Data;

/**
 * Interface CommentInterface
 *
 * @package Lebed\Blog\Api\Data
 */
interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'lebed_blog_comment';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID         = 'id';
    const POST_ID    = 'post_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME  = 'last_name';
    const EMAIL      = 'email';
    const COMMENT    = 'comment';
    const ANSWER     = 'answer';
    const STATUS     = 'status';
    const CREATED_AT  = 'created_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get Post ID
     *
     * @return int
     */
    public function getPostId();

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastName();

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Get answer to comment
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Get comment status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Get creation time
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return CommentInterface
     */
    public function setId($id);

    /**
     * Set post ID
     *
     * @param int $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId);

    /**
     * Set first name
     *
     * @param string $firstName
     *
     * @return CommentInterface
     */
    public function setFirstName($firstName);

    /**
     * Set last name
     *
     * @param string $lastName
     *
     * @return CommentInterface
     */
    public function setLastName($lastName);

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CommentInterface
     */
    public function setEmail($email);

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment);

    /**
     * Set answer to comment
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer);

    /**
     * Set comment status
     *
     * @param string $status
     *
     * @return CommentInterface
     */
    public function setStatus($status);

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return CommentInterface
     */
    public function setCreatedAt($creationTime);
}
