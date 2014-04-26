<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');

class OCSeatMapModelSeatMap extends JModelItem
{
    public function getSeatMap($SeatMapID)
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('ID,Name,SizeX,SizeY');
        $query->from('#__ocseatmap_seatmap');
        $query->where("ID=$SeatMapID");
        $db->setQuery((string)$query);
        $seatmap = $db->loadObject();
        return $seatmap;
    }
    public function getSeatMapSeats($SeatMapID)
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('PositionX,PositionY,SeatTypeName');
        $query->from('#__ocseatmap_seat');
        $query->where('SeatMapID='.$SeatMapID);
        $db->setQuery((string)$query);
        $seats = $db->loadObjectList();
        return $seats;
    }
}