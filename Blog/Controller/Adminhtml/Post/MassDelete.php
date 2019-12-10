<?php


namespace Blog\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
class MassDelete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    protected $filter;
    protected $postCollection;
    public function __construct(
        Action\Context $context,
        Filter $filter,
        \Blog\Blog\Model\ResourceModel\Post\CollectionFactory $postCollection
    )
    {
        $this->filter = $filter;
        $this->postCollection = $postCollection;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->postCollection->create());
        $collectionSize = $collection->getSize();
        try {
            foreach ($collection as $item) {
                $item->delete();
            }
            $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}