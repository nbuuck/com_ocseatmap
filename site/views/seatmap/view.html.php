<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class OCSeatMapViewSeatMap extends JViewLegacy {

    // Overwriting JView display method
    function display($tpl = null) {
        // Get parameter field (from Menu item or URL param)
        $jinput = JFactory::getApplication()->input;
        $SeatMapID = $jinput->get('SeatMapID', 1, 'INT');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        
        // Assign data to the view
        $model = $this->getModel();
        $this->SeatMap = $model->getSeatMap($SeatMapID);
        $this->Seats = $model->getSeatMapSeats($SeatMapID);
        $this->BackgroundImageURL = 
                $jinput->get('BackgroundImageURL', 1, 'STRING');
        parent::display($tpl);
    }

}
