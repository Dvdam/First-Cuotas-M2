<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use First\Cuotas\Model\Cuota;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if($data) {
            $cuota = $this->getRequest()->getParam('cuota');
            if(array_key_exists('entity_id', $cuota)) {
                $id = $cuota['entity_id'];
                $model = $this->model->load($id);
            }
            $model = $this->model->setData($data['cuota']);
        }

        try{
            $model->save();
            $this->messageManager->addSuccessMessage(__('Cuota Saved Sucessfully'));
            $this->_getSession()->setFormData(false);
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' =>$model->getId(), '_current' => true]);
            }
            return $resultRedirect->setPath('*/*/index');

        }catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}

