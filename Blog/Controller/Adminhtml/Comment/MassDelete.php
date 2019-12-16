<?php


namespace Blog\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
class MassDelete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    protected $filter;
    protected $commentCollection;
    public function __construct(
        Action\Context $context,
        Filter $filter,
        \Blog\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollection
    )
    {
        $this->filter = $filter;
        $this->commentCollection = $commentCollection;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->commentCollection->create());
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