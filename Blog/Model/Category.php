<?php


namespace Blog\Blog\Model;


class Category extends \Magento\Framework\Model\AbstractMode
{
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\ResourceModel\Category::class);
    }
}