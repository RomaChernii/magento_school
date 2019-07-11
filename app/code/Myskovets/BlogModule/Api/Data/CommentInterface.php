<?php


namespace Myskovets\BlogModule\Api\Data;


interface CommentInterface
{
    const TABLE_NAME = 'myskovets_blog_comment';

    CONST ID = "id";
    const USER_FIRST_NAME = "user_first_name";
    const USER_LAST_NAME = "user_last_name";
    const USER_EMAIL = "user_email";
    const COMMENT = "comment";
    const POST_ID = "post_id";
    const STATUS = "status";

    public function getId();
    public function getUserFirstName();
    public function getUserLastName();
    public function getUserEmail();
    public function getComment();
    public function getPostId();
    public function getStatus();

    public function setId($id);
    public function setUserFirstName($userFirstName);
    public function setUserLastName($userLastName);
    public function setUserEmail($userEmail);
    public function setPostId($postId);
    public function setStatus($status);
}