<?php


namespace Blog\Blog\Model;


use Blog\Blog\Api\Data\CommentInterface;

class Comment extends \Magento\Framework\Model\AbstractModel implements CommentInterface
{

    public function getId()
    {
        return $this->getData(self::COMMENT_ID);
    }

    public function getCommentContent()
    {
       return $this->getData(self::COMMENT_CONTENT);
    }

    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    public function setCommentContent($commentContent)
    {
        return $this->setData(self::COMMENT_CONTENT, $commentContent);
    }

    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }
}