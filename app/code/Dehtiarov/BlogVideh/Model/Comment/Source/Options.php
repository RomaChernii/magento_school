<?php
/**
 * Blog posts for comment
 *
 * @category  Dehtiarov
 * @package   Dehtiarov\BlogVideh
 * @author    Dehtiarov Victor <videh@smile.fr>
 * @copyright 2018 Smile
 */

namespace Dehtiarov\BlogVideh\Model\Comment\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Dehtiarov\BlogVideh\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class Status
 *
 * @package Dehtiarov\BlogVideh\Model\Comment\Source
 */
class Options implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    private $_postFactory;

    /**
     * Options constructor.
     *
     * @param CollectionFactory $posts
     */
    public function __construct(CollectionFactory $posts)
    {
        $this->_postFactory = $posts;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $psFactory = $this->_postFactory->create();
        $dataResult = $psFactory->getData();
        $options = [];
        foreach ($dataResult as $post) {
            $options[] = [
                'label' => $post['title'],
                'value' => $post['id'],
            ];
        }

        return $options;
    }
}
