<?php

namespace Semysiuk\AdminConfigModule\Configuration\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const IS_ENABLE_CONFIG_PATH = "section_id/group_id/field_id";
    const INPUT_VALUE_INPUT_PATH = "section_id/group_id/field_id_input";

    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(self::IS_ENABLE_CONFIG_PATH);
    }

    public function getSecondInput()
    {
        return $this->getIsEnable() ? $this->scopeConfig->getValue(self::INPUT_VALUE_INPUT_PATH) : "";
    }
}
