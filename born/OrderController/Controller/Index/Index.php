<?php


namespace Born\OrderController\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $customOrderModel;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Born\OrderController\Model\Order $customOrderModel
    ) {
        $this->customOrderModel = $customOrderModel;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $orderSearchParams = [
            'increment_id' =>  trim($this->getRequest()->getParam('order_id')),
            'customer_email' => trim($this->getRequest()->getParam('email'))
        ];
        $resultPage = $this->customOrderModel->getOrderDataArray($orderSearchParams);
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($resultPage);
        return $resultJson;
        //return $this->resultPageFactory->create();
    }
}
