<?php


namespace Chleck\Test\Block\Renderer;


use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function getWelcomeText()
    {
       return 'Hello World';
      /*  var_dump(11111111111111111);
        die();*/
    }
}