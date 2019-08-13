<?php 
class Centerkom_Fcp_Block_Adminhtml_Widget_Grid_Column extends Mage_Adminhtml_Block_Widget_Grid_Column
{
	
	protected function _getRendererByType()
    {
        switch (strtolower($this->getType())){
            case 'inputprice':
                return 'fcp/adminhtml_widget_grid_column_renderer_inputprice';
                break;    
			default:
                return parent::_getRendererByType();
                break;
        }	
    }
}
?>