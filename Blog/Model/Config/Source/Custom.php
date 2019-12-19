<?php


namespace Blog\Blog\Model\Config\Source;


class Custom implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('Enable')],
            ['value' => 1, 'label' => __('Disable')]
        ];
    }
}