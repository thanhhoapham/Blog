<?php


namespace Blog\Blog\Controller\Adminhtml\Comment;
use Magento\Backend\App\Action;

class Create extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }

}