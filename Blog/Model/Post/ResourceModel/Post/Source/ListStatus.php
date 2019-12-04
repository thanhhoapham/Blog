<?php


namespace Blog\Blog\Model\Post\ResourceModel\Post\Source;


class ListStatus implements \Magento\Framework\Option\ArrayInterface
{
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