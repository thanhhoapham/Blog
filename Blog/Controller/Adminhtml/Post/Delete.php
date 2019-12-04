<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Magento\Setup\Exception;

class Delete extends \Magento\Backend\App\Action
{

    protected $postFactory;

    public function __construct(
        Action\Context $context,
        \Blog\Blog\Model\PostFactory $postFactory
    )
    {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $blog = $this->getRequest()->getPostValue();
//        var_dump(isset($blog));die;
        $id = $this->getRequest()->getParam('post_id');
        if (isset($blog)) {
            try {
                if ($id) {
                    $blog = $this->postFactory->create()->load($id);
                    $blog->delete();
                    $this->messageManager->addSuccessMessage('Success to delete');
                }
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage('Fail to delete');
            }
        }
        return $this->_redirect('blog/post/index');
    }
}