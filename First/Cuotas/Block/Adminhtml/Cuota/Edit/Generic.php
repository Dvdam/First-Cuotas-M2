<?php

namespace First\Cuotas\Block\Adminhtml\Cuota\Edit;


use Magento\Framework\Registry;
use First\Cuotas\Model\Cuota;

class Generic
{
    protected $urlBuilder;

    protected $registry;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId() {
        /** @var Cuota $cuota */
        $cuota = $this->registry->registry('cuota');
        return $cuota ? $cuota->getId() : null;
    }

    public function getUrl($route='', $param=[]) {
       return $this->urlBuilder->getUrl($route, $param);
    }

}