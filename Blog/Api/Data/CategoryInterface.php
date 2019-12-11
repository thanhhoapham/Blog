<?php


namespace Blog\Blog\Api\Data;


interface CategoryInterface
{
    const CATEGORY_ID = "category_id";
    const CATEGORY_NAME = "category_name";
    const CATEGORY_URL = "category_url";
    const PARENT_ID = "parent_id";

    public function getId();

    public function getCategoryName();

    public function getCategoryUrl();

    public function getParentId();

    public function setCategoryName($categoryName);

    public function setCategoryUrl($categoryUrl);

    public function setParentId($parentId);

}