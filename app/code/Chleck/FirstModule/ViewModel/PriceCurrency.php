<?php


namespace Chleck\FirstModule\ViewModel;

<<<<<<< HEAD
use Magento\Framework\Pricing\PriceCurrencyInterface;
=======
>>>>>>> 8a9cb34061c603472565ddf7cc2ba27172981609
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

