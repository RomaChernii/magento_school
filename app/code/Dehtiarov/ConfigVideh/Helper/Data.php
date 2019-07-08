<?php


namespace Dehtiarov\ConfigVideh\Helper;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const DEHTIAROV_CONFIG_MY_FRIRST_GROUP_VIDEH_FIELD_ID_VIDEH = 'dehtiarov_config/my_first_group_videh/field_id_videh';
    const DEHTIAROV_CONFIG_MY_FRIRST_GROUP_VIDEH_FIELD_ID_VIDEH_INPUT = 'dehtiarov_config/my_first_group_videh/field_id_videh_input';

    public function getIsEnable()
    {
        return $this->scopeConfig->getValue(static::DEHTIAROV_CONFIG_MY_FRIRST_GROUP_VIDEH_FIELD_ID_VIDEH);
    }

    public function getInputVideh(){
        return $this->scopeConfig->getValue(static::DEHTIAROV_CONFIG_MY_FRIRST_GROUP_VIDEH_FIELD_ID_VIDEH_INPUT);
    }

    public function getText(){
        return $this->getIsEnable() ? $this->getInputVideh() : '';
    }
}
