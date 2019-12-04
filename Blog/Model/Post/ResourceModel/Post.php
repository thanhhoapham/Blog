<?php


namespace Blog\Blog\Model\Post\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName="post_id";
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('post', 'post_id');
    }
}