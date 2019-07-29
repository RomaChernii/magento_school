<?php
/**
 * Lebed Blog comment actions
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
 * Class CommentActions
 *
 * @package Lebed\Blog\Ui\Component\Listing\Column
 */
class CommentActions extends Column
{
    /**
     * Url path
     */
    const URL_PATH_EDIT = 'lebed_blog/comment/edit';
    const URL_PATH_ANSWER = 'lebed_blog/comment/answer';
    const URL_PATH_DELETE = 'lebed_blog/comment/delete';
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
                        'edit'       => [
                            'href'  => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        'answer'     => [
                            'href'  => $this->urlBuilder->getUrl(
                                static::URL_PATH_ANSWER,
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Answer'),
                        ],
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
                        'delete' => [
                            'href'  => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete comment id %1', $item['post_id']),
                                'message' => __('Are you sure you want to delete a comment id %1 ?', $item['post_id'])
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
