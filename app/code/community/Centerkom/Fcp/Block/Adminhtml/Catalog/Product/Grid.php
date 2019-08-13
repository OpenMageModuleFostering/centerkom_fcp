<?php 
class Centerkom_Fcp_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
	protected function _prepareColumns()
    {
    	parent::_prepareColumns();
    	$this->getColumn('price')->setType("inputprice");
    	//echo $this->getColumn('price')->getType();
    	return $this;
    }
}

?>