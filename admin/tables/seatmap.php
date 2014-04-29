<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');


class OCSeatMapTableSeatMap extends JTable {

    function __construct(&$db) {
        parent::__construct('#__ocseatmap_seatmap', 'ID', $db);
    }

}
