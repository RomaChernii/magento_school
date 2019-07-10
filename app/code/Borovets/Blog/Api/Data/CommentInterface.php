<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Borovets\Blog\Api\Data;

/**
 * Interface CommentInterface
 *
 * @package Borovets\Blog\Api\Data
 */
interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'borovets_blog_comment';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID         = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME  = 'last_name';
    const EMAIL      = 'email';
    const COMMENT    = 'comment';
    const ANSWER     = 'answer';
    const STATUS     = 'status';
    const WRITED_AT  = 'writed_at';
    const POST_ID    = 'post_id';
    /**#@-*/

    /**
     * Get ID
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
     * Get e-mail
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
     * @return int
     */
    public function getStatus();

    /**
     * Get writing time
     *
     * @return string
     */
    public function getWritedAt();

    /**
     * Get post ID
     *
     * @return int
     */
    public function getPostId();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return CommentInterface
     */
    public function setId($id);

    /**
     * Set first name
     *
     * @param string $first_name
     *
     * @return CommentInterface
     */
    public function setFirstName($first_name);

    /**
     * Set last name
     *
     * @param string $last_name
     *
     * @return CommentInterface
     */
    public function setLastName($last_name);

    /**
     * Set e-mail
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
     * @param int $status
     *
     * @return CommentInterface
     */
    public function setStatus($status);

    /**
     * Set writing time
     *
     * @param string $writed_at
     *
     * @return CommentInterface
     */
    public function setWritedAt($writed_at);

    /**
     * Set post ID
     *
     * @param int $post_id
     *
     * @return CommentInterface
     */
    public function setPostId($post_id);
}
