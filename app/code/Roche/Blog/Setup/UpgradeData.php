<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Roche\Blog\Setup;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Cms\Model\ResourceModel\Block\CollectionFactory as BlockCollectionFactory;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Block collection factory
     *
     * @var BlockCollectionFactory
     */
    protected $blockCollectionFactory;

    public function __construct(BlockCollectionFactory $blockCollectionFactory)
    {
        $this->blockCollectionFactory = $blockCollectionFactory;
    }

    /**
     * Get cms block by identifier
     *
     * @param string $identifier Identifier
     * @param string $store      Store
     *
     * @return \Magento\Framework\DataObject
     */
    public function getCmsBlockByIdentifier($identifier, $store)
    {
        /** @var \Magento\Cms\Model\ResourceModel\Block\Collection $blocks */
        $blocks = $this->blockCollectionFactory->create();
        $blocks
            ->addFieldToFilter(BlockInterface::IDENTIFIER, $identifier)
            ->addStoreFilter($store);

        return $blocks->getFirstItem();
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '0.0.2', '<')) {

            $footerBlock = $this->getCmsBlockByIdentifier(
                'footer_links_block',
                0
            );
            $footerBlockId = $footerBlock->getId();
            if ($footerBlockId) {
                $content = <<<EOD
<ul class="footer links">
    <li class="nav item"><a href="{{store url='about-us'}}">About us</a></li>
    <li class="nav item"><a href="{{store url='customer-service'}}">Customer Service</a></li>
    <li class="nav item"><a href="{{store url='roche_blog/blog_post/index'}}">Roche Blog</a></li>
</ul>
EOD;
                $footerBlock->setContent($content);
                $footerBlock->save();
            }
        }
        $setup->endSetup();
    }
}

