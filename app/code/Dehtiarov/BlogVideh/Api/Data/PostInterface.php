<?php
/**
 * BlogVideh post interface
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Victor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Api\Data;

/**
 * Interface PostInterface
 *
 * @package Roche\Blog\Api\Data
 */
interface PostInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'videh_blog_post';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID          = 'id';
    const TITLE       = 'title';
    const IMAGE       = 'image';
    const DESCRIPTION = 'description';
    const CONTENT     = 'content';
    const IS_ACTIVE   = 'is_active';
    const CREATE_AT   = 'created_at';
    const UPDATE_AT   = 'update_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get image
     *
     * @return string
     */
    public function getImage();

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get content
     *
     * @return string
     */
    public function getContent();

    /**
     * Get is active
     *
     * @return bool
     */
    public function getIsActive();

    /**
     * Get creation time
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Get update time
     *
     * @return string
     */
    public function getUpdateAt();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return PostInterface
     */
    public function setId($id);

    /**
     * Set post title
     *
     * @param string $postTitle
     *
     * @return PostInterface
     */
    public function setTitle($postTitle);

    /**
     * Set post image
     *
     * @param string $postImage
     *
     * @return PostInterface
     */
    public function setImage($postImage);

    /**
     * Set post description
     *
     * @param string $postDescription
     *
     * @return PostInterface
     */
    public function setDescription($postDescription);

    /**
     * Set post content
     *
     * @param string $postContent
     *
     * @return PostInterface
     */
    public function setContent($postContent);

    /**
     * Set post is active
     *
     * @param bool $postIsActive
     *
     * @return PostInterface
     */
    public function setIsActive($postIsActive);

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return PostInterface
     */
    public function setCreatedAt($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     *
     * @return PostInterface
     */
    public function setUpdateAt($updateTime);
}
