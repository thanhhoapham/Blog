<?php


namespace Blog\Blog\Block\Frontend;


use Magento\Framework\View\Element\Template;

class PostDetail extends \Magento\Framework\View\Element\Template
{
    protected $postFactory;
    protected $categoryFactory;
    public function __construct(
        Template\Context $context,
        \Blog\Blog\Model\CategoryFactory $categoryFactory,
        \Blog\Blog\Model\PostFactory $postFactory
    )
    {
        $this->postFactory = $postFactory;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }
}