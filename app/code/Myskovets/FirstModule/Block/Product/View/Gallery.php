<?php

namespace Myskovets\FirstModule\Block\Product\View;

use Magento\Catalog\Block\Product\View\Gallery as MgGallery;
use Magento\Framework\Data\Collection;
use Magento\Framework\DataObject;

class Gallery extends MgGallery {

    public function getGalleryImages()
    {
        $product = $this->getProduct();
        $images = $product->getMediaGalleryImages();
        if ($images instanceof Collection) {
            foreach ($images as $image) {
                /* @var DataObject $image */
                $image->setData(
                    'small_image_url',
                    'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1920px-Flag_of_the_United_States.svg.png'
                );
                $image->setData(
                    'medium_image_url',
                    'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1920px-Flag_of_the_United_States.svg.png'
                );
                $image->setData(
                    'large_image_url',
                    'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1920px-Flag_of_the_United_States.svg.png'
                );
                $image->setData(
                    'url',
                    'https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/1920px-Flag_of_the_United_States.svg.png'
                );
            }
        }

        return $images;
    }
}