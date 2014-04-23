<?php

/* 
 * The MIT License
 *
 * Copyright 2014 nbuuck.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');

class OCSeatMapModelSeatMaps extends JModelItem
{
    public function getSeatMaps()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('ID,Name,SizeX,SizeY');
        $query->from('#__ocseatmap_seatmap');
        $db->setQuery((string)$query);
        $seatmaps = $db->loadObjectList();
        foreach($seatmaps as $seatmap)
        {
            $seatmap->Seats = $this->getSeatMapSeats($seatmap->ID);
        }
        return $seatmaps;
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