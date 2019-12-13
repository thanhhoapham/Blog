<?php


namespace Blog\Blog\Api;


interface PostRepositoryInterface
{
    /**
     * save post
     *
     * @param \Blog\Blog\Api\Data\PostInterface $post
     * @return \Blog\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\PostInterface $post);

    /**
     * Retrieve block
     *
     * @param $postId
     * @return \Blog\Blog\Api\Data\PostInterface $post
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($postId);

    /**
     * @return
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList();

    /**
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete();

    /**
     * @param \Blog\Blog\Api\Data\PostInterface $postId
     * @return bool true on success
     */
    public function deleteById($postId);


}