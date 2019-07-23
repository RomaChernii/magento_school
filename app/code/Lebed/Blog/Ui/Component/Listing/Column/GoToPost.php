<?php
/**
 * Lebed Blog GoToPost
 *
 * @category  Lebed
 * @package   Lebed\Blog
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\Blog\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class GoToPost
 *
 * @package Lebed\Blog\Ui\Component\Listing\Column
 */
class GoToPost extends Column
{
    /**
     * Url path
     */
    const BLOG_URL_PATH_EDIT = 'lebed_blog/post/edit';

    /**
     * Url builder
     *
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct(
            $context,
            $uiComponentFactory,
            $components,
            $data
        );
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'go_to_post' => [
                            'href'   => $this->urlBuilder->getUrl(
                                static::BLOG_URL_PATH_EDIT,
                                [
                                    'id' => $item['post_id'],
                                ]
                            ),
                            'label'  => __('Go to Post %1', $item['post_id']),
                            'target' => '_blank',
                        ],
                    ];
                }
            }
        }

        return $dataSource;
    }
}
