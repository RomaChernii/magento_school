<?php
/**
 * Koshyk comment interface
 *
 * @category  Koshyk
 * @package   Koshyk\Blog
 * @author    Roman Koshyk <romadaaaa@gmail.com>
 */
namespace Koshyk\Blog\Api\Data;

/**
 * Interface CommentInterface
 *
 * @package KoshykBlog\Api\Data
 */
interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'koshyk_blog_comment';
    /**#@+
     * Constants defined for keys of data array.
     */
    const ID          = 'id';
    const POST_ID     = 'post_id';
    const FIRST_NAME  = 'first_name';
    const LAST_NAME   = 'last_name';
    const CREATE_DATE = 'date';
    const EMAIL       = 'email';
    const COMMENT     = 'comment';
    const ANSWER      = 'answer';
    const STATUS      = 'status';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();
    /**
     * Get Post id
     *
     * @return integer
     */
    public function getPostId();
    /**
     * Get First name
     *
     * @return string
     */
    public function getFirstName();
    /**
     * Get Last name
     *
     * @return string
     */
    public function getLastName();
    /**
     * Get creation date
     *
     * @return string
     */
    public function getCreateDate();
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();
    /**
     * Get Comment
     *
     * @return string
     */
    public function getComment();
    /**
     * Get Answer
     *
     * @return string
     */
    public function getAnswer();
    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus();
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
     * @param string $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId);
    /**
     * Set comment first name
     *
     * @param string $firstName
     *
     * @return CommentInterface
     */
    public function setFirstName($firstName);
    /**
     * Set comment last name
     *
     * @param string $lastName
     *
     * @return CommentInterface
     */
    public function setLastName($lastName);
    /**
     * Set comment date
     *
     * @param bool $commentDate
     *
     * @return CommentInterface
     */
    public function setCreateDate($commentDate);
    /**
     * Set Email
     *
     * @param string $commentEmail
     *
     * @return CommentInterface
     */
    public function setEmail($commentEmail);
    /**
     * Set comment text
     *
     * @param string $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment);
    /**
     * Set answer text
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer);
    /**
     * Set comment answer
     *
     * @param string $commentStatus
     *
     * @return CommentInterface
     */
    public function setStatus($commentStatus);

}
