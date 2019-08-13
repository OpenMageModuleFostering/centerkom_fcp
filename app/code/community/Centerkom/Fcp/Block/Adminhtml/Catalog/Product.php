<?php 
class Centerkom_Fcp_Block_Adminhtml_Catalog_Product extends Mage_Adminhtml_Block_Catalog_Product
{
    /**
     * Prepare button and grid
     *
     * @return Mage_Adminhtml_Block_Catalog_Product
     */
    protected function _prepareLayout()
    {
    	$headBlockJs = $this->getLayout()->getBlock('head');
		$headBlockJs->addJs("centerkom/fcp.js");
    	
        $this->_addButton('upgrade_price', array(
            'label'   => Mage::helper('catalog')->__('Upgrade prices'),
            'onclick' => "updatePrice('".Mage::helper("adminhtml")->getUrl("fcp/adminhtml_index/index/", array('store'=>$this->getRequest()->getParam('store', 0)))."')",
            'class'   => 'upgrade_price'
        ));

        $this->setChild('grid', $this->getLayout()->createBlock('adminhtml/catalog_product_grid', 'product.grid'));
        return parent::_prepareLayout();
    }
}

?>