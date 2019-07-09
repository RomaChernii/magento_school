<?php
namespace Myskovets\HelloWorld\Block;
class Display extends \Magento\Framework\View\Element\Template
{

    protected $_postFactory;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context
                                )
    {
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }
}