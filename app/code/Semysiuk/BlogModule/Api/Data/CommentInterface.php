<?php

namespace Semysiuk\BlogModule\Api\Data;

/**
 * Interface CommentInterface
 *
 * @package Semysiuk\BlogModule\Api\Data
 */
interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = "semysiuk_blog_comment";

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID = "id";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const EMAIL = "email";
    const COMMENT = "comment";
    const DATE = "date";
    const STATUS = "status";
    const ANSWER = "answer";
    const POST_ID = "post_id";
    /**#@-*/

    /**
     * Get Id
     *
     * @return int
     */
    public function getId();

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
     * Get date
     *
     * @return string
     */
    public function getDate();

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Get post Id
     *
     * @return int
     */
    public function getPostId();

    /**
     * Set Id
     *
     * @param int $id
     *
     * @return CommentInterface
     */
    public function setId($id);

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
     * Set date
     *
     * @param string $date
     *
     * @return CommentInterface
     */
     public function setDate($date);

     /**
      * Set status
      *
      * @param int $status
      *
      * @return CommentInterface
      */
     public function setStatus($status);

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer);

    /**
     * Set post id
     *
     * @param int $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId);
}
