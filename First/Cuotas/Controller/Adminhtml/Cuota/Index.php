<?php

namespace First\Cuotas\Controller\Adminhtml\Cuota;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    private $pageFactory;
   public function __construct(
       PageFactory $pageFactory,
       Action\Context $context)
   {
       $this->pageFactory = $pageFactory;
       parent::__construct($context);
   }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('First_Cuotas::parent');
    }


    public function execute()
    {
        $resultPage = $this->pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Cuotas')));

		return $resultPage;
    }
}