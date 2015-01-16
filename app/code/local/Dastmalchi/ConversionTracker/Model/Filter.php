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
     * Enables Varien Filter to display arrays as JSON
     */
    public function arrayDirective($construction)
    {
        if (count($this->_templateVars)==0) {
            // If template preprocessing
            return $construction[0];
        }

        $replacedValue = json_encode($this->_getVariable($construction[2], ''));
        return $replacedValue;
    }
}
