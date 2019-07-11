<?php
/**
 * BlogVideh post model
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Victor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */
namespace Dehtiarov\BlogVideh\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Dehtiarov\BlogVideh\Api\Data\PostInterface;

/**
 * Class Post
 *
 * @package Dehtiarov\BlogVideh\Model\Post
 *
 */
class Post extends AbstractModel implements PostInterface, IdentityInterface
{
    /**#@+
     * Post's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**#@-*/

    /**
     * Dehtiarov post cache tag
     */
    const CACHE_TAG = 'videh_blog_post';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'videh_blog_post';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'videh_blog_post';

    /**
     * Post construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Dehtiarov\BlogVideh\Model\ResourceModel\Post');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve post id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Get is active
     *
     * @return bool
     */
    public function getIsActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * Get creation time
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATE_AT);
    }

    /**
     * Get update time
     *
     * @return string
     */
    public function getUpdateAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return PostInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set post title
     *
     * @param string $postTitle
     *
     * @return PostInterface
     */
    public function setTitle($postTitle)
    {
        return $this->setData(self::TITLE, $postTitle);
    }

    /**
     * Set post image
     *
     * @param string $postImage
     *
     * @return PostInterface
     */
    public function setImage($postImage)
    {
        return $this->setData(self::IMAGE, $postImage);
    }

    /**
     * Set post description
     *
     * @param string $postDescription
     *
     * @return PostInterface
     */
    public function setDescription($postDescription)
    {
        return $this->setData(self::DESCRIPTION, $postDescription);
    }

    /**
     * Set post content
     *
     * @param string $postContent
     *
     * @return PostInterface
     */
    public function setContent($postContent)
    {
        return $this->setData(self::CONTENT, $postContent);
    }

    /**
     * Set post is active
     *
     * @param bool $postIsActive
     *
     * @return PostInterface
     */
    public function setIsActive($postIsActive)
    {
        return $this->setData(self::IS_ACTIVE, $postIsActive);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return PostInterface
     */
    public function setCreatedAt($creationTime)
    {
        return $this->setData(self::CREATE_AT, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     *
     * @return PostInterface
     */
    public function setUpdateAt($updateTime)
    {
        return $this->setData(self::UPDATE_AT, $updateTime);
    }

    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}
