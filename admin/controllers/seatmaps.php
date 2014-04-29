<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controlleradmin');

class OCSeatMapControllerSeatMaps extends JControllerAdmin
{
        /**
         * Proxy for getModel.
         * @since       2.5
         */
        public function getModel($name = 'SeatMaps', $prefix = 'OCSeatMapModel') 
        {
                $model = parent::getModel($name, $prefix,
                        array('ignore_request' => true));
                return $model;
        }
}