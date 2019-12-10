<?php


namespace Blog\Blog\Block\Adminhtml\Post\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Blog\Blog\Block\Adminhtml\Post\Edit\GenericButton;

class BackButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}