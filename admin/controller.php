<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

/**
 * General Controller of HelloWorld component
 */
class OCSeatMapController extends JControllerLegacy {

    /**
     * display task
     *
     * @return void
     */
    function display($cachable = false, $urlparams = false) {
        // set default view if not set
        $input = JFactory::getApplication()->input;
        $input->set('view', $input->getCmd('view', 'SeatMaps'));

        // call parent behavior
        parent::display($cachable);
    }

}
