<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use First\Cuotas\Model\Cuota;


class Delete extends Action
{

    protected $model;
    private $pageFactory;
    protected $resultRedirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,
        Cuota $cuota,
        PageFactory $pageFactory,
        Action\Context $context)
    {
        $this->resultRedirectFactory = $redirectFactory;
        $this->model = $cuota;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('First_Cuotas::parent');
    }


    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $model = $this->model;
            $model->load($id);
            try {
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Cuota Deleted'));
                return $resultRedirect->setPath('*/*/index');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        return $resultRedirect->setPath('*/*/index');
    }


}