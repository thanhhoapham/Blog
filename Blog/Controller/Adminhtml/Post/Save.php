<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Blog\Blog\Model\Post;
use Blog\Blog\Model\PostFactory;
use Blog\Blog\Api\PostRepositoryInterface;



class Save extends \Blog\Blog\Controller\Adminhtml\Post implements HttpPostActionInterface
{
    protected $dataPersistor;
    private $postFactory;
    private $postRepository;

    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        PostFactory $postFactory  ,
        PostRepositoryInterface $postRepository
    )
    {
        $this->dataPersistor = $dataPersistor;
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * @inheritDoc
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data) {

            $model = $this->postFactory->create();
            $id = $this->getRequest()->getParam('post_id');
            if($id) {
                try {
                    $model = $this->postRepository->getById($id);
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__($e->getMessage()));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            $model->setData($data);
            try {
                $this->postRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the blog'));
                $this->dataPersistor->clear('blog_post');
                return $this->processPostReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving th blog'));
            }
        }
    }

    private function processPostReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['post_id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } else if ($redirect === 'duplicate') {
            $duplicateModel = $this->postFactory->create(['data' => $data]);
            $duplicateModel->setId(null);
//            $duplicateModel->setIdentifier($data['identifier'] . '-' . uniqid());
//            $duplicateModel->setIsActive(Block::STATUS_DISABLED);
            $this->postRepository->save($duplicateModel);
            $id = $duplicateModel->getId();
            $this->messageManager->addSuccessMessage(__('You duplicated the block.'));
            $this->dataPersistor->set('blog_post', $data);
            $resultRedirect->setPath('*/*/edit', ['post_id' => $id]);
        }
        return $resultRedirect;
    }
    protected function validateDate($dateStart, $dateFinish)
    {
        if (strtotime($dateStart) > strtotime($dateFinish)) {
            return false;
        }
        return true;
    }

    protected function validateTitle($title)
    {
        $post = $this->postFactory->create();
        $postCollection = $post->getCollection();
        foreach ($postCollection as $post) {
            if ($post->getTitle() === $title) {
                return false;
            }
        }
        return true;
    }
}