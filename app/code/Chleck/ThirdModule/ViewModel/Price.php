<?php
/**
 * Chleck ThirdModule ViewModel Price
 *
 * @category  Chleck
 * @package   Chleck\ThirdModule
 * @author    Yuri Chleck <yurichlek@gmail.com>
 * @copyright 2019 Smile
 */

namespace Chleck\ThirdModule\ViewModel;

use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Price implements ArgumentInterface
{
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * Price constructor.
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        PriceCurrencyInterface $priceCurrency
    ) {
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * @param $value
     * @return string
     */
    public function getCheckoutPrice($value)
    {
        return $this->priceCurrency->convertAndFormat($value);
    }
}
