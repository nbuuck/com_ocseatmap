<?php

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class OCSeatMapViewSeatMaps extends JViewLegacy {

    function display($tpl = null) {
        // Get data from the model
        $items = $this->get('Items');
        $pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Assign data to the view
        $this->items = $items;
        $this->pagination = $pagination;
        $this->addToolBar();
        $this->setDocument();
        
        // Display the template
        parent::display($tpl);
    }
    
    protected function addToolBar() {
        JToolBarHelper::title(JText::_('COM_OCSEATMAP_MANAGER_SEATMAPS'),
                'wrench');
        JToolBarHelper::addNew('seatmaps.add');
        JToolBarHelper::editList('seatmaps.edit');
        JToolBarHelper::deleteList('', 'seatmaps.delete');
    }

    protected function setDocument() {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_OCSEATMAP_ADMINISTRATION'));
    }

}
