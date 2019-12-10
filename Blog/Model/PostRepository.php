<?php

namespace Blog\Blog\Model;

use Blog\Blog\Api\Data;
use Blog\Blog\Api\PostRepositoryInterface;
use \Blog\Blog\Model\ResourceModel\Post as ResourcePost;
use Magento\Setup\Exception;
use Magento\Store\Model\StoreManagerInterface;
class PostRepository implements PostRepositoryInterface
{
    protected $postFactory;
    protected $resource;
    protected $storeManager;
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory,
        StoreManagerInterface $storeManager
    )
    {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @inheritDoc
     */
    public function save(Data\PostInterface $post)
    {
       try {
           $this->resource->save($post);
       } catch (\Exception $e) {
           throw new Exception($e->getMessage());
       }
    }

    /**
     * @inheritDoc
     */
    public function getById($postId)
    {
        $post = $this->postFactory->create();
        $this->resource->load($post, $postId);
        if(!$post->getId()) {
            throw new Exception(__('The blog with the "%1" ID doesn\'t exists', $postId));
        }
        return $post;
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
    public function deleteById($postId)
    {
        // TODO: Implement deleteById() method.
    }
}