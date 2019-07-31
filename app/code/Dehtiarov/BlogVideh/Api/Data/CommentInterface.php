<?php
/**
 * BlogVideh comment interface
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Victor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api\Data;

/**
 * Interface CommentInterface
 *
 * @package Dehtiarov\BlogVideh\Api\Data
 */
interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'videh_blog_comment';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID          = 'id';
    const POST_ID     = 'post_id';
    const FIRST_NAME  = 'first_name';
    const LAST_NAME   = 'last_name';
    const EMAIL       = 'email';
    const COMMENT     = 'comment';
    const ANSWER      = 'answer';
    const STATUS      = 'status';
    const CREATED_AT  = 'created_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
    * Get post id
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
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus();

    /**
     * Get created at
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
     * Set post id
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
     * @param string $commentEmail
     *
     * @return CommentInterface
     */
    public function setEmail($commentEmail);

    /**
     * Set comment
     *
     * @param bool $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment);

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer);

    /**
     * Set status
     *
     * @param bool $status
     *
     * @return CommentInterface
     */
    public function setStatus($status);

    /**
     * Set created at
     *
     * @param string $createdAt
     *
     * @return CommentInterface
     */
    public function setCreatedAt($createdAt);
}
