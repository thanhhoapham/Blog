<?php


namespace Blog\Blog\Model\ResourceModel\Comment;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = "comment_id";
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\Comment::class, \Blog\Blog\Model\ResourceModel\Comment::class);
    }
}