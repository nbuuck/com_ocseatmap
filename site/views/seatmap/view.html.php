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
jimport('joomla.application.component.view');

class OCSeatMapViewSeatMap extends JViewLegacy {

    // Overwriting JView display method
    function display($tpl = null) {
        // Get parameter field (from Menu item or URL param)
        $jinput = JFactory::getApplication()->input;
        $SeatMapID = $jinput->get('SeatMapID', 1, 'INT');
        // Assign data to the view
        $model = $this->getModel();
        $this->SeatMap = $model->getSeatMap($SeatMapID);
        $this->Seats = $model->getSeatMapSeats($SeatMapID);
        $this->BackgroundImageURL = 
                $jinput->get('BackgroundImageURL', 1, 'STRING');
        parent::display($tpl);
    }

}
