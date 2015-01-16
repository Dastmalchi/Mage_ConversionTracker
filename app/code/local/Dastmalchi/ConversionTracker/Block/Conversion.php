<?php
/**
 * This file is part of Dastmalchi_ConversionTracker.
 */

/**
 * @category   Views
 * @package    Dastmalchi_ConversionTracker
 * @version    0.9.0
 */

/**
 * HTML Block for conversion tracking code
 *
 * @version    0.9.0
 * @package    Dastmalchi_ConversionTracker
 */
class Dastmalchi_ConversionTracker_Block_Conversion extends Mage_Core_Block_Template
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('dastmalchi/conversiontracker/conversion.phtml');

        return $this;
    }

    /**
     * Gets last order for current session
     */
    protected function getOrder()
    {
        $_customerId = Mage::getSingleton('customer/session')->getCustomerId();
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        $order = Mage::getSingleton('sales/order');
        return $order->load($lastOrderId);
    }

    /**
     * Gets tracking code from Magento config
     * @return (string) Tracking code
     */
    public function getTrackingCode()
    {
        $order = $this->getOrder();
        $replacements = array(
            'order' => $order,
        );

        $filter = Mage::getModel('dastmalchi_conversiontracker/filter');
        $filter->setVariables($replacements);

        $trackingCode = Mage::getStoreConfig('conversiontracker_settings/messages/tracking_code');

        return $filter->filter($trackingCode);
    }
}
?>
