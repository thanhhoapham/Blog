<?php


namespace Blog\Blog\Block\Frontend;


use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $postFactory;
    protected $categoryFactory;
    public function __construct(
        Template\Context $context,
        \Blog\Blog\Model\PostFactory $postFactory,
        \Blog\Blog\Model\CategoryFactory $categoryFactory
    )
    {
        $this->postFactory = $postFactory;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }
    public function getPostCollection()
    {
        $model = $this->postFactory->create;
        $listPost = $model->getCollection();
        return $listPost;
    }
   public function getPost()
   {
       $postCollection = $this->postFactory->create()->getCollection();
       $postCollection->addFieldToFilter('status', ['eq' => 0]);
       return $postCollection;
   }
}