<?php


namespace Blog\Blog\Model;


use Blog\Blog\Api\Data\PostInterface;

class Post extends \Magento\Framework\Model\AbstractModel implements PostInterface
{

    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\ResourceModel\Post::class);
    }
    public function getId()
    {
        return $this->getData(self::POST_ID);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getShortDescription()
    {
       return $this->getData(self::SHORT_DESCRIPTION);
    }

    public function getPostContent()
    {
       return $this->getData(self::POST_CONTENT);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function getThumbnail()
    {
        return $this->getData(self::THUMBNAIL);
    }

    public function getPublishDateTo()
    {
        return $this->getData(self::FINISH_DATE);
    }

    public function getPublishDateFrom()
    {
        return $this->getData(self::START_DATE);
    }

    public function getPostUrl()
    {
        return $this->getData(self::POST_URL);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setShortDescription($shortDescription)
    {
        return $this->setData(self::SHORT_DESCRIPTION, $shortDescription);
    }

    public function setPostContent($postContent)
    {
        return $this->setData(self::POST_CONTENT, $postContent);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function setThumbnail($thumbnail)
    {
        return $this->setData(self::THUMBNAIL, $thumbnail);
    }

    public function setPublishDateTo($publishDateTo)
    {
        return $this->setData(self::FINISH_DATE, $publishDateTo);
    }

    public function setPublishDateFrom($publishDateFrom)
    {
        return $this->setData(self::START_DATE, $publishDateFrom);
    }

    public function setPostUrl($postUrl)
    {
        return $this->setData(self::POST_URL, $postUrl);
    }
}