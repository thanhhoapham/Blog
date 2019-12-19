<?php


namespace Blog\Blog\Model\ResourceModel\PostCategory;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\PostCategory::class, \Blog\Blog\Model\ResourceModel\PostCategory::class);
    }
}