<?php
/**
 * Dehtiarov FirstModule Product View Block
 *
 * @category  Dehtiarov
 * @package   Dehtiarov/FirstModule
 * @author    Viktor Dehtiarov <videh@smile.fr>
 * @copyright 2019 Smile
 */

namespace Dehtiarov\FirstModule\Block\Product;

use Magento\Catalog\Block\Product\View as MagentoView;

/*
 * class View
 *
 * @package Dehtiarov\FirstModule\Block\Product
 */
class View extends MagentoView
{
    /**
     * Get Custom Review Text
     *
     * @return Magento\Framework\Phrase
     */
    public function getCustomReview()
    {
        return __("My custom review products!!!");
    }
}
