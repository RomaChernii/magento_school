<?php
namespace Koshyk\ThirdModule\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PriceCurrency implements ArgumentInterface
{
    protected $priceCurrency;

    public function __construct(
        PriceCurrencyInterface $priceCurrency
    ) {
        $this->priceCurrency = $priceCurrency;
    }

   public function getCheckoutPrice($value)
   {
       return $this->priceCurrency->convertAndFormat($value);
   }
}
