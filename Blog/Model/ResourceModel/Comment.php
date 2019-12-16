<?php


namespace Blog\Blog\Model\ResourceModel;


class Comment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName="comment_id";
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('comment', 'comment_id');
    }
}