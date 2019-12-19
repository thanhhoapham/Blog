<?php


namespace Blog\Blog\Model\ResourceModel;


class PostCategory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('post_category', 'post_id');
    }
}