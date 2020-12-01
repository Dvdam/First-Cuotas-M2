<?php

namespace First\Cuotas\Block\Adminhtml\Cuota\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        return [
            'label' => __('Save Cuota'),
            'class' => 'save primary',
            'sort_order' => 50
        ];
    }
}