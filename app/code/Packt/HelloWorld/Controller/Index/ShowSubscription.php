<?php
namespace Packt\HelloWorld\Controller\Index;

class ShowSubscription extends \Magento\Framework\App\Action\Action {

    public function execute() {
        $subscription = $this->_objectManager->create('Packt\HelloWorld\Model\Subscription');
        $data = $subscription->load();
    }
}