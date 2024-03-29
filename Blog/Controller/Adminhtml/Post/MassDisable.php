<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;

class MassDisable extends \Magento\Backend\App\Action
{

    protected $filter;
    protected $blogCollection;

    public function __construct(
        Action\Context $context,
        Filter $filter,
        \Blog\Blog\Model\ResourceModel\Post\CollectionFactory $blogCollection
    )
    {
        $this->filter = $filter;
        $this->blogCollection = $blogCollection;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->blogCollection->create());
        foreach ($collection as $item) {
            $item->setData('status', 1);
            $item->save();
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been disabled.', $collection->getSize()));
        return $this->_redirect('blog/post/index');
    }
}