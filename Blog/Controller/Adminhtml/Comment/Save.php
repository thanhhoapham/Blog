<?php


namespace Blog\Blog\Controller\Adminhtml\Comment;
use Magento\Backend\App\Action;
use Blog\Blog\Api\CommentRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Blog\Blog\Model\CommentFactory;
class Save extends \Blog\Blog\Controller\Adminhtml\Comment implements HttpPostActionInterface
{
    protected $dataPersistor;
    private $commentFactory;
    private $commentRepository;

    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        CommentFactory $commentFactory  ,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->dataPersistor = $dataPersistor;
        $this->commentRepository = $commentRepository;
        $this->commentFactory = $commentFactory;
        parent::__construct($context, $coreRegistry);
    }
    /**
     * @inheritDoc
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data) {

            $model = $this->commentFactory->create();
            $id = $this->getRequest()->getParam('comment_id');
            if($id) {
                try {
                    $model = $this->commentRepository->getById($id);
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__($e->getMessage()));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            $model->setData($data);
            try {
                $this->commentRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the comment'));
                $this->dataPersistor->clear('blog_comment');
                return $this->processPostReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the comment'));
            }
        }
    }
    private function processPostReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['comment_id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } else if ($redirect === 'duplicate') {
            $duplicateModel = $this->commentFactory->create(['data' => $data]);
            $duplicateModel->setId(null);
            $this->commentRepository->save($duplicateModel);
            $id = $duplicateModel->getId();
            $this->messageManager->addSuccessMessage(__('You duplicated the comment.'));
            $this->dataPersistor->set('blog_comment', $data);
            $resultRedirect->setPath('*/*/edit', ['comment_id' => $id]);
        }
        return $resultRedirect;
    }
}