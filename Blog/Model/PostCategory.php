<?php


namespace Blog\Blog\Model;


class PostCategory extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\ResourceModel\PostCategory::class);
    }
}