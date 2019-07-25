<?php

namespace Semysiuk\BlogModule\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class CommentActions
 *
 * @package Semysiuk\BlogModule\Ui\Component\Listing\Colum\CommentActions
 */
class CommentActions extends Column
{
    /**
     * Url path
     */
    const URL_PATH_ANSWER = 'semysiuk_blogmodule/comment/answer';
    const URL_PATH_PREVIEW = 'semysiuk_blogmodule/comment/preview';

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
    )
    {
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
                        'answer' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_ANSWER,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Give an answer')
                        ],
                        'preview' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_PREVIEW,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Preview')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
