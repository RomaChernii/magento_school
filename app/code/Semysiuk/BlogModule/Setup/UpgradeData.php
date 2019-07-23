<?php


namespace Semysiuk\BlogModule\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Semysiuk\BlogModule\Setup\CmsSetup;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Cms setup
     *
     * @var CmsSetup
     */
    protected $cmsSetup;

    /**
     * UpgradeData constructor
     *
     * @param CmsSetup $cmsSetup
     */
    public function __construct(CmsSetup $cmsSetup)
    {
        $this->cmsSetup = $cmsSetup;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '0.0.4', '<')) {

            //Create new CMS page
//            $pageData = [
//                [
//                    PageInterface::IDENTIFIER => 'semysiuk-faq',
//                    PageInterface::TITLE => 'Frequently Asked Questions',
//                    PageInterface::PAGE_LAYOUT => '1column',
//                    PageInterface::CONTENT_HEADING => 'Frequently Asked Questions',
//                    PageInterface::CONTENT => $this->cmsSetup->getIncludeFile(__DIR__ . '/include/page/semysiuk-faq.phtml'),
//                    PageInterface::IS_ACTIVE => 1,
//                    'store_code' => ''
//                ]
//            ];
            //$this->cmsSetup->createPages($pageData);

            //Update CMS block
            $stores = $this->cmsSetup->getStores();
            foreach ($stores as $store) {
                /** @var \Magento\Cms\Model\Page $page */
                $block = $this->cmsSetup->getCmsBlockByIdentifier('footer_links_block', $store);
                $content = $this->cmsSetup->getIncludeFile(__DIR__ . '/include/block/footer-link.phtml');
                $block->setContent($content);
                $block->save();
            }

            //Create new CMS block
            $blockData = [
                [
                    BlockInterface::IDENTIFIER => 'block-comment-policy',
                    BlockInterface::TITLE => 'Blog Comment Policy',
                    BlockInterface::CONTENT => $this->cmsSetup->getIncludeFile(__DIR__ . '/include/block/block-comment-policy.phtml'),
                    BlockInterface::IS_ACTIVE => 1,
                    'store_code' => ''
                ]
            ];
            $this->cmsSetup->createCmsBlock($blockData);
        }

        if (version_compare($context->getVersion(), '0.0.5', '<')) {

            //Create new CMS page
            $pageData = [
                [
                    PageInterface::IDENTIFIER => 'semysiuk-faq',
                    PageInterface::TITLE => 'Frequently Asked Questions',
                    PageInterface::PAGE_LAYOUT => '1column',
                    PageInterface::CONTENT_HEADING => 'Frequently Asked Questions',
                    PageInterface::CONTENT => $this->cmsSetup->getIncludeFile(__DIR__ . '/include/page/semysiuk-faq.phtml'),
                    PageInterface::IS_ACTIVE => 1,
                    'store_code' => ''
                ]
            ];
            $this->cmsSetup->createPages($pageData);
        }
        $setup->endSetup();
    }
}


