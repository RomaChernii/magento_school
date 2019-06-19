<?php
/**
 * Lebed FirstModule Renderer Index controller
 *
 * @category  Lebed
 * @package   Lebed/FirstModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FirstModule\Block\Renderer;

use Magento\Framework\View\Element\Template;

/*
 * Class Wording
 *
 * @package Lebed\FirstModule\Block\Renderer
 */
class Wording extends Template {
    /**
     * Get text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getText() {
        return __("Hello World!!!");
    }
}
