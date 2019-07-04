<?php

namespace Skavronskiy\SamConfiguration\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const IS_ENABLE_CONFIG_PATH ='sam_section/my_sam/sam_id';
    const INPUT_VALUE_CONFIG_PATH ='sam_section/my_sam/sam_input';
    public function getIsEnable()
    {
     return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    public function getValue()
    {
        $text = "";
        if($this->getIsEnable())
            $text = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        return $text;
    }
}
