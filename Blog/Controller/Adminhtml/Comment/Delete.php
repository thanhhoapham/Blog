<?php


namespace Blog\Blog\Controller\Adminhtml\Comment;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Magento\Setup\Exception;
class Delete extends \Magento\Backend\App\Action
{
    protected $commentFactory;

    public function __construct(
        Action\Context $context,
        \Blog\Blog\Model\CommentFactory $commentFactory
    )
    {
        $this->commentFactory = $commentFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $blog = $this->getRequest()->getPostValue();
        $id = $this->getRequest()->getParam('comment_id');
        if (isset($blog)) {
            try {
                if ($id) {
                    $blog = $this->commentFactory->create()->load($id);
                    $blog->delete();
                    $this->messageManager->addSuccessMessage('Success to delete');
                }
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage('Fail to delete');
            }
        }
        return $this->_redirect('blog/comment/index');
    }

}