<?php


namespace Chleck\FirstModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class PriceCurrency
 * @package Chleck\FirstModule\ViewModel
 */
class PriceCurrency implements ArgumentInterface
{
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;
    /**
     * PriceCurrency constructor.
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        PriceCurrencyInterface $priceCurrency
    )
    {
        $this->priceCurrency = $priceCurrency;
    }
    /**
     * @param $value
     * @return string
     */
    public function getCheckoutPrice($value){
        return $this->priceCurrency->convertAndFormat($value);
    }
}

