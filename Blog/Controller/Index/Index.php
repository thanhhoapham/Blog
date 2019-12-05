<?php


namespace Blog\Blog\Controller\Index;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        echo "Hello";
    }
}