<?php


namespace Blog\Blog\Controller\Adminhtml;
use Magento\Backend\App\Action;

abstract class Category extends \Magento\Backend\App\Action
{
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
}