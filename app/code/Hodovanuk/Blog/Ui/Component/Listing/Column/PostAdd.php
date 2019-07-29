<?php
namespace Hodovanuk\Blog\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class PostAdd
 * @package Hodovanuk\Blog\Ui\Component\Listing\Column
 */
class PostAdd extends Column
{
    /**
     * Url path
     */
    const URL_PATH_COMMENT = 'hodovanuk_blog/post/comment';
    /**
     *
     */
    const URL_PATH_DELETE = 'hodovanuk_blog/post/delete';

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
     * @param UiComponentFactory $uiComponentFactorys
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
                        'comment' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_COMMENT,
                                [
                                    'id' => $item['id']
                                ]
                            ),
                            'label' => __('Comment')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}