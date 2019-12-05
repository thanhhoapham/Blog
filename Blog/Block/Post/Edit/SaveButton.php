<?php


namespace Blog\Blog\Block\Post\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Blog\Blog\Block\Post\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'post_listing',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'continue'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
//            'class_name' => Container::SPLIT_BUTTON
        ];
    }
}