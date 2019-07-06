<?php

namespace Myskovets\FirstModule\Block\Product;

use \Magento\Catalog\Block\Product\View as MgView;

class View extends MgView {
    public function myFunc() {
        return __('MyFunc from MyView');
    }

//    public function getReviewUrl() {
//        return $this->getUrl('')
//    }
}