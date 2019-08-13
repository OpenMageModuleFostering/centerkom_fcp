<?php 
class Centerkom_Fcp_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
   
    public function indexAction(){
    	try {
    		
			$postData = Mage::app()->getRequest()->getPost();
			$storeId = $this->getRequest()->getParam('store', 0);
			foreach (json_decode($postData['dane']) as $key=>$val)
			{
				if(!is_numeric($val)) die ("Cena ".$key." musi byc liczba");
				// retrieve product id using sku
				 $product_id = Mage::getModel('catalog/product')
				                    ->getIdBySku($key);
				
				// call product model and create product object
				$product    = Mage::getModel('catalog/product')
							->setStoreId($storeId);
				// Load product using product id
				 $product ->load($product_id);
							
				$productInfoData = $product->getData();
				$productInfoData['price'] = $val;
				$product->setData($productInfoData);
				
				// Save you product with all tier prices
				$product->save(); 
			}
			$data = array("result"=>"OK");
 
			echo Zend_Json::encode($data);	
		}
		catch (Exception $e)
		{
			echo $e;
		}  
		   
    }
}
?>