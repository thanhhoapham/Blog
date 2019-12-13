<?php


namespace Blog\Blog\Model;


use Blog\Blog\Api\Blog;
use Blog\Blog\Api\CategoryRepositoryInterface;
use Blog\Blog\Api\Data;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function save(Data\CategoryInterface $category)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function getById($categoryId)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @inheritDoc
     */
    public function getList()
    {
        // TODO: Implement getList() method.
    }

    /**
     * @inheritDoc
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteById($categoryId)
    {
        // TODO: Implement deleteById() method.
    }
}