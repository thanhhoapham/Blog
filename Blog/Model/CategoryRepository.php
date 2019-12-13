<?php


namespace Blog\Blog\Model;
use Blog\Blog\Api\CategoryRepositoryInterface;
use Blog\Blog\Api\Data;
use Blog\Blog\Model\ResourceModel\Category as ResourcePost;
use Magento\Store\Model\StoreManagerInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $categoryFactory;
    protected $resource;
    protected $storeManager;
    public function __construct(
        ResourcePost $resource,
        CategoryFactory $categoryFactory,
        StoreManagerInterface $storeManager
    )
    {
        $this->resource = $resource;
        $this->categoryFactory = $categoryFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function save(Data\CategoryInterface $category)
    {
        try {
            $this->resource->save($category);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function getById($categoryId)
    {
        $category = $this->categoryFactory->create();
        $this->resource->load($category, $categoryId);
        if(!$category->getId()) {
            throw new Exception(__('The blog with the "%1" ID doesn\'t exists', $categoryId));
        }
        return $category;
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