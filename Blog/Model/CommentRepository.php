<?php


namespace Blog\Blog\Model;
use Blog\Blog\Api\CommentRepositoryInterface;
use Blog\Blog\Api\Data;
use Blog\Blog\Model\ResourceModel\Comment as ResourcePost;
use Magento\Store\Model\StoreManagerInterface;

class CommentRepository implements CommentRepositoryInterface
{
    protected $commentFactory;
    protected $resource;
    protected $storeManager;
    public function __construct(
        ResourcePost $resource,
        CommentFactory $commentFactory,
        StoreManagerInterface $storeManager
    )
    {
        $this->resource = $resource;
        $this->commentFactory = $commentFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @inheritDoc
     */
    public function save(Data\CommentInterface $comment)
    {
        try {
            $this->resource->save($comment);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function getById($commentId)
    {
        $comment = $this->commentFactory->create();
        $this->resource->load($comment, $commentId);
        if(!$comment->getId()) {
            throw new Exception(__('The blog with the "%1" ID doesn\'t exists', $commentId));
        }
        return $comment;
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
    public function deleteById()
    {
        // TODO: Implement deleteById() method.
    }
}