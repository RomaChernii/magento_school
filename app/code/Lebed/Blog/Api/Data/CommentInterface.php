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
    const CREATE_AT  = 'created_at';
    /**#@-*/
}
