<?php
namespace Hodovanuk\Config\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 * @package Hodovanuk\Config\Helper
 */
class Data extends AbstractHelper
{
    /**
     *  Path to Yes/no value
     */
    const IS_ENABLE_CONFIG_PATH = 'hodovanuk_section/hodovanuk_store_information/hodovanuk_field';

    /**
     *  Path to text field value
     */
    const INPUT_VALUE_CONFIG_PATH = 'hodovanuk/second_field/value';

    /**
     * @return mixed
     */
    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    /**
     * @return bool|mixed
     */
    public function getSecondValue()
    {
        $returnValue = false;

        if ($this->getIsEnable()) {
            $returnValue = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        }

        return $returnValue;
    }

}
