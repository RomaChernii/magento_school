<?php

namespace Borovets\Configuration_Borovets\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const IS_ENABLE_CONFIG_PATH = 'borovets_section/my_group_1/field_id';
    const INPUT_VALUE_CONFIG_PATH = 'borovets_section/my_group_1/field_id_input';

    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    public function getInputFieldValue()
    {
        $text = "";
        if($this->getIsEnable())
            $text = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        
        return $text;
    }
}
