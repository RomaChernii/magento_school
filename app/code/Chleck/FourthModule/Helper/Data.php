<?php

namespace Chleck\FifthModule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    const IS_ENABLE_CONFIG_PATH = 'chleck_task/my_first_group/chleck_id';
    const INPUT_VALUE_CONFIG_PATH = 'payment/my_first_group/chleck_id';

    /**
     * @return mixed
     */
    public function getIsEnable(){
        return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);
    }

    /**
     * @return mixed
     */
    public function getString(){
        if($this->getIsEnable()){
            return $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
        }
    }
}
