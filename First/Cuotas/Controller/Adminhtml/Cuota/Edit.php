<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use First\Cuotas\Model\Cuota;


class Edit extends Action
{
    protected $cuota;

    private $pageFactory;
    protected $registry;

    public function __construct(
        PageFactory $pageFactory,
        Cuota $cuota,
        Registry $registry,
        Action\Context $context)
    {
        $this->cuota = $cuota;
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('First_Cuotas::parent');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->cuota;

        if($id) {
            $model->load($id);
            if(!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Cuota does not exists'));

                $result = $this->resultRedirectFactory->create();
                return $result->setPath("cuotas/cuota/index");
            }
        }

        $data = $this->_getSession()->getFormData(true);

        if(!empty($data)) {
            $model->setData($data);
        }

        $this->registry->register('cuota', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();

        $resultPage->addBreadcrumb(
            $id ? __('Edit Cuota') : __('Add a New Cuota'),
            $id ? __('Edit Cuota') : __('Add a New Cuota')
        );
        if($id) {
            $resultPage->getConfig()->getTitle()->prepend('Edit Cuota');
        } else {
            $resultPage->getConfig()->getTitle()->prepend('Add New Cuota');
        }
        return $this->pageFactory->create();
    }
}