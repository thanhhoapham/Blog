<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Setup\Exception;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;
    protected $postFactory;

    public function __construct(
        Action\Context $context,
        \Blog\Blog\Model\PostFactory $postFactory
    )
    {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $posts = $this->getRequest()->getPostValue();
//        var_dump($posts);die;
        $id = $this->getRequest()->getParam('post_id');
        if (!empty($posts)) {
            $blog = $this->postFactory->create();
            // edit blog
            if ($id) {
                try {
                    $this->savePost($blog->load($id), $posts);
                    return $this->_redirect('blog/post/create', ['post_id' => $id]);
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage('Fail to edit this blog');
                    return $this->_redirect('blog/post/create', ['post_id' => $id]);
                }
            } else {
                try {
                    $this->savePost($blog, $posts);
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage('Fail to add a new blog');
                    return $this->_redirect('blog/post/create');
                }
            }
        }

        return $this->_redirect('blog/post/index');
    }

    public function savePost($blog, $posts)
    {
        if (!empty($posts['title']) && $this->validateTitle($posts['title'])) {
            $blog->setData('title', $posts['title']);
        } else {
            $this->messageManager->addErrorMessage('Title is not valid');
            return $this->_redirect('blog/post/create');
        }
        $blog->setData('short_description', $posts['short_description']);
        $blog->setData('post_content', $posts['post_content']);
        $blog->setData('status', $posts['status']);

        if ($this->validateDate($posts['publish_date_from'], $posts['publish_date_to'])) {
            $blog->setData('publish_date_to', $posts['publish_date_to']);
            $blog->setData('publish_date_from', $posts['publish_date_from']);
        } else {
            $this->messageManager->addErrorMessage('Date start is greater than date finish');
            return $this->_redirect('blog/post/create');
        }
        if(!empty($posts['post_id'])) {
            $this->messageManager->addSuccessMessage("Success to edit this blog");
        } else {
            $this->messageManager->addSuccessMessage("Success to add a new blog");
        }

        $blog->save();
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