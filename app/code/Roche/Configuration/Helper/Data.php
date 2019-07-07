<?php
/**
 * Roche Configuration Data helper
 *
 * @category  Roche
 * @package   Roche\Configuration
 * @author    Roman Chernii <roche@smile.fr>
 * @copyright 2019 Smile
 */
namespace Roche\Configuration\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package Roche\Configuration\Helper
 */
class Data extends AbstractHelper
{
    /**
     * #@+
     * Config path const
     */
    const IS_ENABLE_CONFIG_PATH = 'roche_section/my_first_group/field_id';
    const INPUT_VALUE_CONFIG_PATH = 'roche_section/my_first_group/field_id_input';
    /**#@-*/


    /**
     * Get is enable
     *
     * @return bool
     */
    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    /**
     * Get input value
     *
     * @return string
     */
    public function getInputValue()
    {
        $result = '';
        if ($this->getIsEnable()) {
            $result = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        }

        return $result;
    }
}
