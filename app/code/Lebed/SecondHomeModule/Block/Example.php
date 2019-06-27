<?php
/**
 * Lebed SecondHomeModule Block
 *
 * @category  Lebed
 * @package   Lebed/SecondHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */

namespace Lebed\SecondHomeModule\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Example
 *
 * @package Lebed\SecondHomeModule\Block
 */
class Example extends Template
{
    /**
     * get Example Block Text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getExampleText() {
        return __('Second Home Task Module Example Block is here!');
    }
}
