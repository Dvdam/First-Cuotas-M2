<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;

class NewAction extends Action
{

    protected  $forwardFactory;
    private $pageFactory;
    
    public function __construct(
        PageFactory $pageFactory,
        ForwardFactory $forwardFactory,
        Action\Context $context)
    {
        $this->forwardFactory = $forwardFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('First_Cuotas::parent');
    }


    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->forwardFactory->create();
        return $resultForward->forward('edit');
    }
}