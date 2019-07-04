<?php
namespace Hodovanuk\Config\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const IS_ENABLE_CONFIG_PATH = 'hodovanuk_section/hodovanuk_store_information/hodovanuk_field';
    //Yes no
    const INPUT_VALUE_CONFIG_PATH = 'hodovanuk/second_field/value';

    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    public function getSecondValue()
    {
        $returnValue = false;

        if ($this->getIsEnable()) {
            $returnValue = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        }

        return $returnValue;
    }

}