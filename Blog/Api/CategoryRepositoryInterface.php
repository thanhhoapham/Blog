<?php


namespace Blog\Blog\Api;


interface CategoryRepositoryInterface
{
    /**
     * @param Data\CategoryInterface $category
     * @return \Blog\Blog\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\CategoryInterface $category);

    /**
     * @param $categoryId
     * @return \Blog\Blog\Api\Data\CategoryInterface $category
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($categoryId);

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
     * @param \Blog\Blog\Api\Data\CategoryInterface $categoryId
     * @return bool true on success
     */
    public function deleteById($categoryId);
}