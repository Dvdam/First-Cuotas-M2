<?php

namespace First\Cuotas\Model\ResourceModel\Cuota;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use First\Cuotas\Model\Cuota;
use First\Cuotas\Model\ResourceModel\Cuota as CuotaResource;

class Collection extends AbstractCollection
{

    protected $_idFieldName = 'cuota_id';
    
    protected function _construct()
    {
        parent::_construct();
        $this->_init(Cuota::class, CuotaResource::class);
    }

}