<?php
namespace Hodovanuk\Blog\Api\Data;

interface CommentInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'hodovanuk_blog_comment';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID          = 'id';
    const FIRST_NAME  = 'first_name';
    const LAST_NAME   = 'last_name';
    const ANSWER      = 'answer';
    const COMMENT     = 'comment';
    const CREATE_DATA = 'data';
    const POST_ID     = 'post_id';
    const EMAIL       = 'email';
    const ANSWER_DATA = 'answer_data';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

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
     * Get Answer
     *
     * @return integer
     */
    public function getAnswer();

    /**
     * Get Comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Get Data
     *
     * @return string
     */
    public function getCreateData();

    /**
     * Get Post id
     *
     * @return integer
     */
    public function getPostId();

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    public function getAnswerData();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return CommentInterface
     */
    public function setId($id);

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
     * Set comment answer
     *
     * @param string $commentAnswer
     *
     * @return CommentInterface
     */
    public function setAnswer($commentAnswer);

    /**
     * Set comment text
     *
     * @param string $comment
     *
     * @return CommentInterface
     */
    public function setComment($comment);

    /**
     * Set comment data
     *
     * @param bool $commentData
     *
     * @return CommentInterface
     */
    public function setCreateData($commentData);

    /**
     * Set post id
     *
     * @param string $postId
     *
     * @return CommentInterface
     */
    public function setPostId($postId);

    /**
     * Set Email
     *
     * @param string $commentEmail
     *
     * @return CommentInterface
     */
    public function setEmail($commentEmail);

    public function setAnswerData($answerData);
}
