<?php

namespace First\Cuotas\Model;

use Magento\Framework\Model\AbstractModel;
use First\Cuotas\Model\ResourceModel\Cuota as CuotaResource;
use First\Cuotas\Api\Data\CuotaInterface;

class Cuota extends AbstractModel implements CuotaInterface
{

    protected function _construct()
    {
        $this->_init(CuotaResource::class);
    }


    /**
     * @return int
     */
    public function getCuota()
    {

        return $this->getData(CuotaInterface::CUOTA);
    }

    /**
     * @return int
     *
     */
    public function getInteres()
    {
        return $this->getData(CuotaInterface::INTERES);
    }

    

    /**
     * @param string $cuota
     * @return \First\Cuotas\Api\Data\CuotaInterface
     */
    public function setCuota($cuota)
    {
        $this->setData(CuotaInterface::NAME, $cuota);
    }

    /**
     * @param boolean $interes
     * @return \First\Cuotas\Api\Data\CuotaInterface
     */
    public function setInteres($interes)
    {
        $this->setData(CuotaInterface::INTERES, $interes);
    }
}