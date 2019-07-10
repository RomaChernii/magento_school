<?php

namespace Chleck\Blog\Api\Data;

interface CommentInterface
{
    const TABLE_NAME = 'chleck_blog_comment';

    /**#@+
     * Constants defined for keys of data array.
     */
    const POST_ID     = 'post_id';
    const COMMENT_ID  = 'comment_id';
    const NAME        = 'name';
    const SURNAME     = 'surname';
    const EMAIL       = 'email';
    const COMMENT     = 'comment';
    const ANSWER      = 'answer';
    /**#@-*/

    /**
     * Get post ID
     *
     * @return int
     */
    public function getPostId();

    /**
     * Get comment ID
     *
     * @return int
     */
    public function getCommentId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname();

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
     * @return bool
     */
    public function getAnswer();

    /**
     * Set post ID
     *
     * @param int $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId);

    /**
     * Set comment ID
     *
     * @param int $commentId
     *
     * @return CommentInterface
     */
    public function setCommentId($commentId);

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CommentInterface
     */
    public function setName($name);

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return CommentInterface
     */
    public function setSurname($surname);

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
     * Set answer
     *
     * @param string $answer
     *
     * @return CommentInterface
     */
    public function setAnswer($answer);

}
