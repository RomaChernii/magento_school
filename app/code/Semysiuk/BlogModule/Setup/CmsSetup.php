<?php

namespace Semysiuk\BlogModule\Setup;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Cms\Model\ResourceModel\Block\CollectionFactory as BlockCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Api\Data\PageInterfaceFactory;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as PageCollectionFactory;

/**
 * Class CmsSetup
 *
 * @package Semysiuk\BlogModule\Setup
 */
class CmsSetup
{
    use TraitSetup;

    /**
     * Block repository
     *
     * @var BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * Block factory
     *
     * @var BlockInterfaceFactory
     */
    protected $blockFactory;

    /**
     * Block collection factory
     *
     * @var BlockCollectionFactory
     */
    protected $blockCollectionFactory;

    /**
     * Loaded stores
     *
     * @var array
     */
    protected $loadedStores;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Page factory
     *
     * @var PageInterfaceFactory
     */
    protected $pageFactory;

    /**
     * Page repository
     *
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * Page collection factory
     *
     * @var PageCollectionFactory
     */
    protected $pageCollectionFactory;


    /**
     * CmsSetup constructor
     *
     * @param BlockRepositoryInterface $blockRepository
     * @param BlockInterfaceFactory    $blockFactory
     * @param BlockCollectionFactory   $blockCollectionFactory
     * @param StoreManagerInterface    $storeManager
     * @param PageInterfaceFactory     $pageFactory
     * @param PageRepositoryInterface  $pageRepository
     * @param PageCollectionFactory    $pageCollectionFactory
     */
    public function __construct(
        BlockRepositoryInterface $blockRepository,
        BlockInterfaceFactory $blockFactory,
        BlockCollectionFactory $blockCollectionFactory,
        StoreManagerInterface $storeManager,
        PageInterfaceFactory  $pageFactory,
        PageRepositoryInterface $pageRepository,
        PageCollectionFactory $pageCollectionFactory
    ) {
        $this->blockRepository        = $blockRepository;
        $this->blockFactory           = $blockFactory;
        $this->blockCollectionFactory = $blockCollectionFactory;
        $this->storeManager           = $storeManager;
        $this->pageFactory            = $pageFactory;
        $this->pageRepository         = $pageRepository;
        $this->pageCollectionFactory  = $pageCollectionFactory;
    }

    /**
     * Create CMS block
     *
     * @param array $cmsData
     *
     * @return CmsSetup
     */
    public function createCmsBlock(array $cmsData)
    {
        $loadedCms = $this->getCmsBlocks($cmsData);
        foreach ($cmsData as $data) {
            $storeId = $this->getStoreIdByCode($data['store_code']);
            $block = $this->blockFactory->create();
            if (isset($loadedCms[$storeId][$data[BlockInterface::IDENTIFIER]])) {
                $block = $loadedCms[$storeId][$data[BlockInterface::IDENTIFIER]];
                $data = array_merge($block->getData(), $data);
            }
            $block->setIdentifier($data[BlockInterface::IDENTIFIER])
                ->setTitle($data[BlockInterface::TITLE])
                ->setContent($data[BlockInterface::CONTENT])
                ->setIsActive($data[BlockInterface::IS_ACTIVE])
                ->setData('stores', $this->getStoreIdByCode($data['store_code']));

            $block->getResource()->save($block);
        }

        return $this;
    }

    /**
     * Get loaded cms blocks
     *
     * @param array $data
     *
     * @return array
     */
    protected function getCmsBlocks(array $data)
    {
        $storeIds = array_map(
            [$this, 'getStoreIdByCode'],
            array_column($data, 'store_code')
        );
        $loadedCms = $this->blockCollectionFactory->create()->addFieldToFilter(
            BlockInterface::IDENTIFIER,
            [
                'in' => array_unique(
                    array_column(
                        $data,
                        BlockInterface::IDENTIFIER
                    )
                )
            ]
        )->addStoreFilter($storeIds);

        $result = [];
        foreach ($loadedCms->getItems() as $item) {
            $storeIds = implode('|', $item->getData('store_id'));
            $identifier = $item->getData(BlockInterface::IDENTIFIER);
            $result[$storeIds][$identifier] = $item;
        }

        return $result;
    }

    /**
     * Get store id by code
     *
     * @param string $storeCode
     *
     * @return int
     */
    public function getStoreIdByCode($storeCode)
    {
        if ($this->loadedStores === null) {
            $this->loadedStores = [];
            if ($storeCode) {
                /** @var  \Magento\Store\Api\Data\StoreInterface[] $stores */
                $stores = $this->storeManager->getStores();
                foreach ($stores as $store) {
                    $this->loadedStores[$store->getCode()] = $store->getId();
                }
            }
        }

        return isset($this->loadedStores[$storeCode]) ? $this->loadedStores[$storeCode] : 0;
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
     * Get stores
     *
     * @return \Magento\Store\Api\Data\StoreInterface[]
     */
    public function getStores()
    {
        return $this->storeManager->getStores();
    }

    /**
     * Delete block
     *
     * @param \Magento\Cms\Model\Block $block Block
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteBlock($block)
    {
        $this->blockRepository->delete($block);
    }

    /**
     * Create or update cms pages
     *
     * @param array $pagesData
     *
     * @return PageSetup
     */
    public function createPages(array $pagesData)
    {
        $loadedPages = $this->getCmsPages($pagesData);
        foreach ($pagesData as $data) {
            $storeId = $this->getStoreIdByCode($data['store_code']);
            $page = $this->pageFactory->create();
            if (isset($loadedPages[$storeId][$data[PageInterface::IDENTIFIER]])) {
                $page = $loadedPages[$storeId][$data[PageInterface::IDENTIFIER]];
            }
            $page->setIdentifier($data[PageInterface::IDENTIFIER])
                ->setTitle($data[PageInterface::TITLE])
                ->setPageLayout($data[PageInterface::PAGE_LAYOUT])
                ->setContentHeading($data[PageInterface::CONTENT_HEADING])
                ->setContent($data[PageInterface::CONTENT])
                ->setIsActive($data[PageInterface::IS_ACTIVE])
                ->setStoreId($this->getStoreIdByCode($data['store_code']));
            $this->pageRepository->save($page);
        }

        return $this;
    }

    /**
     * Get loaded cms pages
     *
     * @param array $data
     *
     * @return array
     */
    protected function getCmsPages(array $data)
    {
        $storeIds = array_map(
            [$this, 'getStoreIdByCode'],
            array_column($data, 'store_code')
        );
        $loadedCms = $this->pageCollectionFactory->create()->addFieldToFilter(
            PageInterface::IDENTIFIER,
            [
                'in' => array_unique(
                    array_column(
                        $data,
                        PageInterface::IDENTIFIER
                    )
                )
            ]
        )->addStoreFilter($storeIds);

        $result = [];
        foreach ($loadedCms->getItems() as $item) {
            $storeIds = implode('|', $item->getData('store_id'));
            $identifier = $item->getData(PageInterface::IDENTIFIER);
            $result[$storeIds][$identifier] = $item;
        }

        return $result;
    }

    /**
     * Get cmd page by identifier
     *
     * @param string $identifier Identifier
     * @param string $store      Store
     *
     * @return \Magento\Framework\DataObject
     */
    public function getCmsPageByIdentifier($identifier, $store)
    {
        /** @var \Magento\Cms\Model\ResourceModel\Page\Collection $pages */
        $pages = $this->pageCollectionFactory->create();
        $pages
            ->addFieldToFilter(PageInterface::IDENTIFIER, $identifier)
            ->addStoreFilter($store);

        return $pages->getFirstItem();
    }

    /**
     * Delete page
     *
     * @param \Magento\Cms\Model\Page $page Page
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deletePage($page)
    {
        $this->pageRepository->delete($page);
    }
}

