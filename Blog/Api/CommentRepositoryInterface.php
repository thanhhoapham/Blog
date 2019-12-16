<?php


namespace Blog\Blog\Api;


interface CommentRepositoryInterface
{
    /**
     * @param Data\CommentInterface $comment
     * @return \Blog\Blog\Api\Data\CommentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\CommentInterface $comment);
    /**
     * @param $commentId
     * @return \Blog\Blog\Api\Data\CommentInterface $comment
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($commentId);
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
     * @param \Blog\Blog\Api\Data\CommentInterface $commentId
     * @return bool true on success
     */
    public function deleteById();
}