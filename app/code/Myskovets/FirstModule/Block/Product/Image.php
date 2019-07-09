<?php

namespace Myskovets\FirstModule\Block\Product;

use Magento\Catalog\Block\Product\Image as MgImage;

class Image extends MgImage {
    public function getImageUrl() {
        return 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1920px-Flag_of_the_United_States.svg.png';
    }

    public function myImageSize() {
        return array(
            'width' => 1024,
            'height'=> 1024
        );
    }

    public function getWidth() {
        return $this->myImageSize()['width'];
    }

    public function getHeight() {
        return $this->myImageSize()['height'];
    }

    public function getCustomAttributes()
    {
        return '';
    }

    public function getResizedImageHeight()
    {
        return $this->getHeight();
    }

    public function getResizedImageWidth() {
        return $this->getWidth();
    }
}