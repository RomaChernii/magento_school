<?php
/**
 * Lebed FourthModule Helper Data
 *
 * @category  Lebed
 * @package   Lebed/FourthModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */
namespace Lebed\FourthModule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package Lebed\FourthModule\Helper
 */
class Data extends AbstractHelper
{
    /**
     * #@+
     * Config path const
     */
    const IS_ENABLE_CONFIG_PATH = 'lebed_section/lebed_fourth_module_group/yes_no_field';
    const INPUT_VALUE_CONFIG_PATH = 'lebed_section/lebed_fourth_module_group/text_field';
    /**#@-*/

    /**
     * Get is enable
     *
     * @return bool
     */
    public function getIsEnable() {
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    /**
     * Get text config value
     *
     * @return string
     */
    public function getInputValue() {
        $result = '';
        if ($this->getIsEnable()) {
            $result = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        }
        
        return $result;
    }
}
