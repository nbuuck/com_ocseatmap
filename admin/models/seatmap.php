<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modeladmin');

class OCSeatMapModelSeatMap extends JModelAdmin {

    public function getTable($type = 'SeatMap', $prefix = 'OCSeatMapTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) {
        // Get the form.
        $form = $this->loadForm('com_ocseatmap.seatmap',
                'seatmap',
                array('control' => 'jform',
                'load_data' => $loadData));
        if (empty($form)) {
            return false;
        }
        return $form;
    }

    protected function loadFormData() {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
                'com_ocseatmap.edit.seatmap.data', array());
        if (empty($data)) {
            $data = $this->getItem();
        }
        return $data;
    }

}
