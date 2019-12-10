<?php


namespace Blog\Blog\Model\ResourceModel\Category;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = "category_id";
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\Category::class, \Blog\Blog\Model\ResourceModel\Category::class);
    }
}