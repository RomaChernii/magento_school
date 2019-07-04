<?php

namespace Chleck\FifthModule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    public function getIsEnable(){
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

}
