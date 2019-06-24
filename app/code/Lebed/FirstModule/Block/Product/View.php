<?php
/**
 * Lebed FirstModule Product View Block
 *
 * @category  Lebed
 * @package   Lebed/FirstModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstModule\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

/*
 * class View
 *
 * @package Lebed\FirstModule\Block\Product
 */
class View extends MagentoView {
    /**
     * Get Custom Review Text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getCustomReview()
    {
        return __("My custom review!!!");
    }
}
