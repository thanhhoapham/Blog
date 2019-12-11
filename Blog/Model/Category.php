<?php


namespace Blog\Blog\Model;


use Blog\Blog\Api\Data\CategoryInterface;

class Category extends \Magento\Framework\Model\AbstractMode implements CategoryInterface
{
    protected function _construct()
    {
        $this->_init(\Blog\Blog\Model\ResourceModel\Category::class);
    }

    public function getId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function getCategoryName()
    {
        return $this->getData(self::CATEGORY_NAME);
    }

    public function getCategoryUrl()
    {
        return $this->getData(self::CATEGORY_URL);
    }

    public function getParentId()
    {
        return $this->getData(self::PARENT_ID);
    }

    public function setCategoryName($categoryName)
    {
       return $this->setData(self::CATEGORY_NAME, $categoryName);
    }

    public function setCategoryUrl($categoryUrl)
    {
        return $this->setData(self::CATEGORY_URL, $categoryUrl);
    }

    public function setParentId($parentId)
    {
        return $this->setData(self::PARENT_ID, $parentId);
    }
}