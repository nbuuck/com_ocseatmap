<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');

class OCSeatMapModelSeatMaps extends JModelList {

    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query
                ->select('ID,Name')
                ->from('#__ocseatmap_seatmap')
                ->order('Name ASC');
        return $query;
    }

}
