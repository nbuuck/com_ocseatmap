<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
$controller = JControllerLegacy::getInstance('OCSeatMap');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();