<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
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

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        return $this->pageFactory->create();

    }

}