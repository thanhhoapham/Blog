<?php


namespace Blog\Blog\Controller\Adminhtml\Category;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Magento\Setup\Exception;
class Delete extends \Magento\Backend\App\Action
{
    protected $categoryFactory;

    public function __construct(
        Action\Context $context,
        \Blog\Blog\Model\CategoryFactory $categoryFactory
    )
    {
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $blog = $this->getRequest()->getPostValue();
        $id = $this->getRequest()->getParam('category_id');
        if (isset($blog)) {
            try {
                if ($id) {
                    $blog = $this->categoryFactory->create()->load($id);
                    $blog->delete();
                    $this->messageManager->addSuccessMessage('Success to delete');
                }
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage('Fail to delete');
            }
        }
        return $this->_redirect('blog/category/index');
    }
}