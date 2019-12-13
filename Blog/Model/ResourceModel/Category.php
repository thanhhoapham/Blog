<?php


namespace Blog\Blog\Model\ResourceModel;


class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName="category_id";
    protected function _construct()
    {
        $this->_init('category', 'category_id');
    }
}