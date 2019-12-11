<?php


namespace Blog\Blog\Model\ResourceModel\Category\Source;


class ListCategory implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        $options = [];
        $options[] = [
            'label' => 'Enable',
            'value' => 0
        ];
        $options[] = [
            'label' => 'Disable',
            'value' => 1
        ];
        return $options;
    }
}