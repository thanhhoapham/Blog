<?php


namespace Blog\Blog\Controller\Adminhtml;


use Magento\Backend\App\Action;

abstract class Post extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = "Blog_Blog::post";
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
//    protected function initPage($resultPage)
//    {
//        $resultPage->setActiveMenu('Blog_Blog::blog_post')
//            ->addBreadcrumb(__('Blog'), __('Blog'))
//            ->addBreadcrumb(__('Static Blocks'), __('Static Blocks'));
//        return $resultPage;
//    }

}

