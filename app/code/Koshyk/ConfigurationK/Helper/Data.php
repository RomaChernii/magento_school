<?php
namespace Koshyk\ConfigurationK\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
   const IS_ENABLE_CONFIG_PATH = 'section/key/first_key';
   const INPUT_VALUE_CONFIG_PATH = 'section/key/second_key';
   public function getIsEnable()
   {
       return $this->scopeConfig->getValue(static::IS_ENABLE_CONFIG_PATH);

   }

   public function getTrue()
   {
       $result = ' ';
       if($this->getIsEnable())
       {
           $result = $this->scopeConfig->getValue(static::INPUT_VALUE_CONFIG_PATH);
       }
       return $result;
   }
}
