<?php


namespace Blog\Blog\Controller\Adminhtml\Category;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    protected $pageFactory;
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}