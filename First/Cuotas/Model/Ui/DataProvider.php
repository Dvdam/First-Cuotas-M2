<?php

namespace First\Cuotas\Model\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;
use First\Cuotas\Model\ResourceModel\Cuota\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
   protected $loadedData;
    public function __construct(
        CollectionFactory $collectionFactory,
        $name,
        $primaryFieldName,
        $requestFieldName, array $meta = [],
        array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)) {
           return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();

        foreach ($items as $cuota) {
            $this->loadedData[$cuota->getId()]['cuota'] = $cuota->getData();
        }

      return $this->loadedData;
    }
}