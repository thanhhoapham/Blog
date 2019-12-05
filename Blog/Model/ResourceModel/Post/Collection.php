<?php


namespace Blog\Blog\Model\ResourceModel\Post;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = "post_id";
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\Post::class, \Blog\Blog\Model\ResourceModel\Post::class);
    }

}