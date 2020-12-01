<?php

namespace First\Cuotas\Block\Adminhtml\Cuota\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends Generic implements ButtonProviderInterface
{

    public function getButtonData()
    {
       $data = [];

       if($this->getId()) {
           $data = [
               'label' => __('Delete Button'),
               'on_click' => 'deleteConfirm(\''.__('Are You Sure You want to Delete this Cuota?')
               .'\',\''.
               $this->getDeleteUrl().'\')',
               'class' => 'delete',
               'sort_order'=> 20

           ];
       }
       return  $data;
    }

    public function getDeleteUrl() {
        return $this->getUrl('*/*/delete', ['id'=>$this->getId()]);
    }
}