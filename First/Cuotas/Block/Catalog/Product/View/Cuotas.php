<?php

namespace First\Cuotas\Block\Catalog\Product\View;

use Magento\Framework\View\Element\Template;

class Cuotas extends Template
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \First\Cuotas\Model\CuotaFactory
     */
    protected $_cuotaFactory;

    /**
     * @var \First\Cuotas\Helper\Data
     */
    protected $_cuotasHelper;

    /**
     * @var \Magento\Framework\Serialize\SerializerInterface
     */
    protected $serializer;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \First\Cuotas\Model\CuotaFactory $cuotaFactory,
        \First\Cuotas\Helper\Data $helper,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        array $data = []
    ) {
        $this->_cuotasHelper = $helper;
        $this->serializer = $serializer;
        $this->_coreRegistry = $coreRegistry;
        $this->_cuotaFactory = $cuotaFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return float
     */
    public function getProductPriceToFinance()
    {
        return $this->_coreRegistry->registry('current_product')->getFinalPrice();
    }

    /**
     * @return bool|string
     */
    public function getCuotas()
    {
        $cuotaCollection = $this->_cuotaFactory->create()->getCollection();
        $cuotas = [];

        foreach ($cuotaCollection->getData() as $_cuota) {
            //$cuotas[$_cuota['cuota']][] = $_cuota;
            $cuotas[$_cuota['cuota']] = $_cuota;
        }
        return $this->serializer->serialize($cuotas);
        //return \Zend_Json::encode($cuotas);
    }

    /**
     * @return false|mixed
     */
    public function displayTitle()
    {
        if (!$this->_cuotasHelper->isEnabledInFrontend()) {
            return false;
        }
        return $this->_cuotasHelper->getTitle();
    }
}
