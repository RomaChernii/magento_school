<?php
/**
 * Roche Blog order plan file upload
 *
 * @category  Roche
 * @package   Roche\Blog
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Myskovets\BlogModule\Model\Post\Image;

use Magento\Catalog\Model\ImageUploader;
use Magento\Framework\Filesystem;
use Magento\Framework\UrlInterface;
use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Uploader
 *
 * @package Roche\Blog\Model\Order\Stand
 */
class Uploader extends ImageUploader
{
    /**
     * Plan path
     */
    const FILE_PATH = 'myskovets_blog/post/image';

    /**
     * Allowed mime types
     *
     * @var array
     */
    protected $allowedMimeTypes;

    /**
     * Uploader factory
     *
     * @var UploaderFactory
     */
    protected $uploaderFactory;

    /**
     * Original file name
     *
     * @var string
     */
    protected $originalFileName = null;

    /**
     * PlanUploader constructor
     *
     * @param Database              $coreFileStorageDatabase
     * @param Filesystem            $filesystem
     * @param UploaderFactory       $uploaderFactory
     * @param StoreManagerInterface $storeManager
     * @param LoggerInterface       $logger
     * @param string                $baseTmpPath
     * @param string                $basePath
     * @param array                 $allowedExtensions
     * @param array                 $allowedMimeTypes
     */
    public function __construct(
        Database $coreFileStorageDatabase,
        Filesystem $filesystem,
        UploaderFactory $uploaderFactory,
        StoreManagerInterface $storeManager,
        LoggerInterface $logger,
        $baseTmpPath,
        $basePath,
        array $allowedExtensions = [],
        array $allowedMimeTypes = []
    ) {
        parent::__construct(
            $coreFileStorageDatabase,
            $filesystem,
            $uploaderFactory,
            $storeManager,
            $logger,
            $baseTmpPath,
            $basePath,
            $allowedExtensions
        );
        $this->uploaderFactory = $uploaderFactory;
        $this->allowedMimeTypes = $allowedMimeTypes;
    }

    /**
     * Checking file for save and save it to tmp dir
     *
     * @param string $fileId File id
     *
     * @return string[]
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Exception
     */
    public function saveFileToTmpDir($fileId)
    {
        $baseTmpPath = $this->getBaseTmpPath();
        /** @var \Magento\MediaStorage\Model\File\Uploader $uploader */
        $uploader = $this->uploaderFactory->create(['fileId' => $fileId]);
        $uploader->setAllowedExtensions($this->getAllowedExtensions());
        $uploader->setAllowRenameFiles(true);
        if (!$uploader->checkMimeType($this->allowedMimeTypes)) {
            throw new LocalizedException(__('File validation failed.'));
        }
        $fileName = null;
        if ($this->getOriginalFileName()) {
            $originalFileName = $this->getOriginalFileName();
            $discretionPath = $uploader->getDispretionPath($originalFileName);
            $baseTmpPath = static::FILE_PATH . $discretionPath;
        }
        $result = $uploader->save($this->mediaDirectory->getAbsolutePath($baseTmpPath), $fileName);
        unset($result['path']);
        if (!$result) {
            throw new LocalizedException(
                __('File can not be saved to the destination folder.')
            );
        }
        $result['tmp_name'] = str_replace('\\', '/', $result['tmp_name']);
        /** @var \Magento\Store\Model\Store $store */
        $store = $this->storeManager->getStore();
        $result['url'] = $store->getBaseUrl(UrlInterface::URL_TYPE_MEDIA)
                         . $this->getFilePath($baseTmpPath, $result['file']);
        $result['name'] = $result['file'];
        if (isset($result['file'])) {
            try {
                $relativePath = rtrim($baseTmpPath, '/') . '/' . ltrim($result['file'], '/');
                $this->coreFileStorageDatabase->saveFile($relativePath);
            } catch (\Exception $e) {
                $this->logger->critical($e);
                throw new LocalizedException(
                    __('Something went wrong while saving the file(s).')
                );
            }
        }

        return $result;
    }

    /**
     * Set original file name
     *
     * @param string $originalFileName Original file name
     *
     * @return void
     */
    public function setOriginalFileName($originalFileName)
    {
        $this->originalFileName = $originalFileName;
    }

    /**
     * Get original file name
     *
     * @return string
     */
    protected function getOriginalFileName()
    {
        return $this->originalFileName;
    }
}
