<?php
namespace Packt\HelloWorld\Controller\Index;

class Collection extends \Magento\Framework\App\Action\Action{

    public function execute(){
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image'
            ])
            ->addAttributeToFilter('name', 'iphone 6');
        $output = '';

        $productCollection->setDataToAll('price', 40);

        foreach ($productCollection as $product) {
            $output .= var_dump($product->debug());
        }
//        $output = $productCollection->getSelect()->__toString();

        $this->getResponse()->setBody($output);
    }
}
