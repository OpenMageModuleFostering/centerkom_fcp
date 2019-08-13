<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Grid input column renderer
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Centerkom_Fcp_Block_Adminhtml_Widget_Grid_Column_Renderer_Inputprice extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Price
{
    protected $_values;


    
    public function render(Varien_Object $row)
    {
        if ($data = $row->getData($this->getColumn()->getIndex())) {
            $currency_code = $this->_getCurrencyCode($row);

            if ($currency_code) {

            $data = floatval($data) * $this->_getRate($row);
            $data = sprintf("%f", $data);
            //$data = Mage::app()->getLocale()->currency($currency_code)->toCurrency($data);
            }
        }
        
        $html = '<input type="text" ';
        $html .= 'name="' . $row->getData("sku") . '" ';
        $html .= 'id="' . $this->getColumn()->getId()."_".$row->getData("sku") . '" ';
        $html .= 'value="' . $data . '"';
        $html .= 'class="input-text inputprice' . $this->getColumn()->getInlineCss() . '"/>';
        $html .= "<strong>".$currency_code."</strong>";
        return $html;
    }
}
