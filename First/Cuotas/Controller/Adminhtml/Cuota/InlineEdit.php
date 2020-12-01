<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\JsonFactory;
use First\Cuotas\Model\Cuota;

class InlineEdit extends Action
{
    protected $cuota;
    protected $jsonFactory;

    public function __construct(
       Cuota $cuota,
        JsonFactory $jsonFactory,
        Action\Context $context)
    {
        $this->cuota = $cuota;
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();

        $error = false;

        $message = [];
        if($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);

            if(!count($postItems)) {
                $message[] = __('Please correct data sent');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelId) {
                    $model = $this->cuota->load($modelId);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$modelId]));
                        $model->save();

                    } catch (\Exception $e) {
                        $message[] = $e->getMessage();
                        $error = true;
                    }
                }

            }
        }

        return $resultJson->setData([
            'messages' => $message,
            'error' => $error
        ]);
    }


}