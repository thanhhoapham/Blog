<?php


namespace Blog\Blog\Model;


class Post extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\Post\ResourceModel\Post::class);
    }

}