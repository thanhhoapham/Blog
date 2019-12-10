<?php


namespace Blog\Blog\Block\Adminhtml\Post\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Blog\Blog\Block\Adminhtml\Post\Edit\GenericButton;
use Magento\Ui\Component\Control\Container;

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
//            'class_name' => Container::SPLIT_BUTTON,
//            'options' => $this->getOptions(),
        ];
    }
//    private function getOptions()
//    {
//        $options = [
//            [
//                'label' => __('Save & Duplicate'),
//                'id_hard' => 'save_and_duplicate',
//                'data_attribute' => [
//                    'mage-init' => [
//                        'buttonAdapter' => [
//                            'actions' => [
//                                [
//                                    'targetName' => 'post_listing',
//                                    'actionName' => 'save',
//                                    'params' => [
//                                        true,
//                                        [
//                                            'back' => 'duplicate'
//                                        ]
//                                    ]
//                                ]
//                            ]
//                        ]
//                    ]
//                ]
//            ],
//            [
//                'id_hard' => 'save_and_close',
//                'label' => __('Save & Close'),
//                'data_attribute' => [
//                    'mage-init' => [
//                        'buttonAdapter' => [
//                            'actions' => [
//                                [
//                                    'targetName' => 'post_listing',
//                                    'actionName' => 'save',
//                                    'params' => [
//                                        true,
//                                        [
//                                            'back' => 'close'
//                                        ]
//                                    ]
//                                ]
//                            ]
//                        ]
//                    ]
//                ]
//            ]
//        ];
//        return $options;
//    }
}