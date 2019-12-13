<?php


namespace Blog\Blog\Model\ResourceModel\Category\Source;


class ListCategory implements \Magento\Framework\Option\ArrayInterface
{
    protected $categoryCollection;
    /**
     * @inheritDoc
     */
    public function __construct(
        \Blog\Blog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
    )
    {
        $this->categoryCollection = $categoryCollection;
    }

    public function toOptionArray()
    {
        $options = [];
        $categories = $this->categoryCollection->create()->load();
        foreach( $categories as $category) {
            $options[] = [
                'value' => $category->getCategoryId(),
                'label' => $category->getCategoryName()
            ];
        }
        return $options;
    }
}