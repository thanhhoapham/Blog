<?php


namespace Blog\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Blog\Blog\Api\CategoryRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Blog\Blog\Model\CategoryFactory;

class Save extends \Blog\Blog\Controller\Adminhtml\Category implements HttpPostActionInterface
{

    protected $dataPersistor;
    private $categoryFactory;
    private $categoryRepository;

    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        CategoryFactory $categoryFactory  ,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->dataPersistor = $dataPersistor;
        $this->categoryRepository = $categoryRepository;
        $this->categoryFactory = $categoryFactory;
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

            $model = $this->categoryFactory->create();
            $id = $this->getRequest()->getParam('category_id');
            if($id) {
                try {
                    $model = $this->categoryRepository->getById($id);
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__($e->getMessage()));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            try {
                $this->categoryRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the category'));
                $this->dataPersistor->clear('blog_category');
                return $this->processPostReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the category'));
            }
        }
    }
    private function processPostReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/edit', ['category_id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } else if ($redirect === 'duplicate') {
            $duplicateModel = $this->categoryFactory->create(['data' => $data]);
            $duplicateModel->setId(null);
            $this->categoryRepository->save($duplicateModel);
            $id = $duplicateModel->getId();
            $this->messageManager->addSuccessMessage(__('You duplicated the category.'));
            $this->dataPersistor->set('blog_category', $data);
            $resultRedirect->setPath('*/*/edit', ['category_id' => $id]);
        }
        return $resultRedirect;
    }

}