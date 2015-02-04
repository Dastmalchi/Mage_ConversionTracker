<?php
/**
 * This file is part of Dastmalchi_ConversionTracker.
 */

/**
 * Extends Varien_Filter_Template with Array Directive
 *
 * @version    0.9.0
 * @package    Dastmalchi_ConversionTracker
 */
class Dastmalchi_Conversiontracker_Model_Filter extends Varien_Filter_Template
{
    /**
     * Override _getVariable() to provide a workaround for {{array order.getAllItems()}} and {{array order.getAllVisibleItems()}}
     */
    protected function _overrideGetVariable($value, $default='{no_value_defined}')
    {
        /**
         * Workaround for getAllItems()
         */
        if ($value == " order.getAllItems()") {
            $_result = array();
            $_products = $this->_getVariable($value, '');
            foreach($_products as $product) {
                $pid = $product->getSku();
                $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $pid);
                array_push($_result, $product->getData());
            }
            return $_result;
        }

        /**
         * Workaround for getAllVisibleItems()
         */
        if ($value == " order.getAllVisibleItems()") {
            $_result = array();
            $_products = $this->_getVariable($value, '');
            foreach($_products as $product) {
                $pid = $product->getSku();
                $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $pid);
                array_push($_result, $product->getData());
            }
            return $_result;
        }

        return $this->_getVariable($value, '');
    }

    /**
     * Enables Varien Filter to display arrays as JSON
     */
    public function arrayDirective($construction)
    {
        if (count($this->_templateVars)==0) {
            // If template preprocessing
            return $construction[0];
        }

        $replacedValue = json_encode($this->_overrideGetVariable($construction[2], ''));
        return $replacedValue;
    }
}
